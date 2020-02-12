<?php
/**
 * Custom post type registration handler that:
 *
 * 1. Loads the configuration of custom post types to be registered.
 * 2. Builds the supported features for each.
 * 3. Registers each with WordPress.
 *
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @package    spiralWebDB\Sandhills
 * @link       http://spiralwebdb.com
 * @license    GNU-2.0+
 */

namespace spiralWebDB\Sandhills;

use InvalidArgumentException;

add_action( 'init', __NAMESPACE__ . '\register_custom_post_types' );
/**
 * Loads the configurations and registers each custom post type with WordPress.
 *
 * @since 1.0.0
 *
 * @return bool true on success; else false.
 * @Throws InvalidArgumentException when "post_type" is not configured.
 */
function register_custom_post_types() {
	// Load the configurations.
	$configs = require_once _get_plugin_directory() . '/src/config/custom-post-types.php';
	if ( ! is_array( $configs ) || empty( $configs ) ) {
		return false;
	}

	// Register each post type.
	foreach ( $configs as $config ) {
		// If "post_type" (slug) is not configured, throw an error to alert the developer.
		if ( empty( $config['post_type'] ) ) {
			throw new InvalidArgumentException( 'Custom post type slug is not configured, i.e. "post_type".' );
		}

		register_custom_post_type( $config['post_type'], $config );
	}

	return true;
}

/**
 * Registers the given custom post type with WordPress.
 *
 * @since 1.0.0
 *
 * @param string $post_type Custom post type slug.
 * @param array  $config    Custom configuration of post type parameters.
 */
function register_custom_post_type( $post_type, array $config ) {
	$config['args']['labels'] = $config['labels'];

	if ( ! $config['args']['supports'] ) {
		$config['args']['supports'] = generate_supported_post_type_features( $config['features'] );
	}

	register_post_type( $post_type, $config['args'] );
}

/**
 * Get all the post type features for the given post type.
 *
 * @since 1.0.0
 *
 * @param array $features Supported features configuration parameters.
 *
 * @return array array of supported features.
 */
function generate_supported_post_type_features( $features = [] ) {
	$base_features      = get_all_post_type_supports( $features['base_post_type'] );
	$supported_features = exclude_post_type_features( $base_features, $features['exclude'] );

	return merge_post_type_features( $supported_features, $features['additional'] );
}

/**
 *  Exclude features from the given supported post type features.
 *
 *  @since 1.0.0
 *
 *  @param array $supported Supported features configuration parameters.
 *  @param array $excluded  Optional. Array of features to exclude.
 *
 *  @return array modified supported features.
 */
function exclude_post_type_features( array $supported, array $excluded = [] ) {
	$supported = array_keys( $supported );

	if ( empty( $excluded ) ) {
		return $supported;
	}

	$features = [];
	foreach ( $supported as $feature ) {
		if ( in_array( $feature, $excluded, true ) ) {
			continue;
		}

		$features[] = $feature;
	}

	return $features;
}

/**
 *  Merge the post type's supported features.
 *
 *  @since 1.0.0
 *
 *  @param array $supported     Supported features configuration parameters.
 *  @param array $additional    Optional. Additional features to merge with our supported features.
 *
 *  @return array
 */
function merge_post_type_features( array $supported, array $additional = [] ) {
	if ( empty( $additional ) ) {
		return $supported;
	}

	return array_merge( $supported, $additional );
}

