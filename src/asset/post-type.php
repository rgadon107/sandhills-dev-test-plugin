<?php
/**
 *  Register custom post type
 *
 * @package    spiralWebDB\Sandhills\Asset
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills\Asset;

use function spiralWebDB\Sandhills\_get_plugin_directory;

add_action( 'init', __NAMESPACE__ . '\load_config_and_register_post_type' );
/**
 * Load custom configuration and register post type to WordPress.
 *
 * @since 1.0.0
 */
function load_config_and_register_post_type() {
	$config = require_once _get_plugin_directory() . '/config/post-type.php';

	if ( ! is_array( $config ) || empty( $config ) ) {
		return false;
	}

	if ( empty( $config['post_type'] ) ) {
		return;
	}

	$post_type = $config['post_type'];

	register_the_custom_post_type( $post_type, $config );
}

/**
 *  Description
 *
 * @param string    $post_type  Custom post type to register.
 * @param array     $config     Custom configuration of post type parameters
 *
 * @since 1.0.0
 */
function register_the_custom_post_type( $post_type, (array) $config ) {
	$args = $config['args'];

	if ( ! $args['supports'] ) {

		$args['supports'] = generate_supported_post_type_features( $config['features'] );

	}

	if ( ! $args['labels'] ) {

		$args['labels'] = generate_the_custom_labels( $config['labels'] ); // first array element refers to post_type.

	}

	register_post_type( $post_type, $args );
}

/**
 * Get all the post type features for the given post type.
 *
 * @since 1.0.0
 * @param array $config Runtime configuration parameters.
 *
 * @return array
 */
function generate_supported_post_type_features( $config = array() ) {

	$base_post_type_features = get_all_post_type_supports( $config['base_post_type'] );

	$supported_features = exclude_post_type_features( $base_post_type_features, $config['exclude'] );

	$supported_features = merge_post_type_features( $supported_features, $config['additional'] );

	return $supported_features;
}

/*
 *  Exclude features from the given supported post type features.
 *
 *  @since 1.0.0
 *
 *  @param array            $supported_features  Array of supported post type features.
 *  @param array|string     $exclude_features (optional) Array of features to exclude.
 *
 *  @return array
 */
function exclude_post_type_features( array $supported_features, $exclude_features ) {
	if ( ! $exclude_features ) {
		return array_keys( $supported_features );
	}

	$features = array();

	foreach ( $supported_features as $feature => $value ) {
		if ( in_array( $feature, $exclude_features ) ) {
			continue;
		}

		$features[] = $feature;
	}

	return $features;
}

/*
 *  Merge the post type's supported features.
 *
 *  @since 1.0.0
 *
 *  @param array   $supported_features An Array of supported post type features.
 *  @param array   $additional_features (optional) The additional features to merge with our supported features.
 *
 *  @return array
 */
function merge_post_type_features( array $supported_features, $additional_features ) {
	if ( ! $additional_features ) {
		return $supported_features;
	}

	return array_merge( $supported_features, $additional_features );
}
