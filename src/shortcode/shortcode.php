<?php
/**
 *  Shortcode handler.
 *
 * @package    spiralWebDB\Sandhills
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills;

function register_the_shortcode( $config = [] ) {

	$config = require_once _get_plugin_directory() . '/config/shortcode.php';

	if ( ! is_array( $config ) || empty( $config ) ) {
		return false;
	}

	if ( empty( $config['shortcode_name'] ) ) {
		return;
	}

	add_shortcode( $config['shortcode_name'], __NAMESPACE__ . '\process_the_shortcode' );
}

/**
 *  Process and render the HTML for the shortcode.
 *
 * @since 1.0.0
 *
 * @param array|string $user_defined_attributes User defined attributes for this shortcode instance.
 * @param string|null  $content                 Content between the opening and closing shortcode elements.
 * @param string       $shortcode_name          Name of the shortcode.
 *
 * @return string
 *
 */
function process_the_shortcode( $user_defined_attributes, $content, $shortcode_name ) {

	$config = require_once _get_plugin_directory() . '/config/shortcode.php';

	$attributes = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);


	if ( $content && $config['do_shortcode_within_content'] ) {
		$content = do_shortcode( $content );
	}

	get_remote_ip_address( $attributes );

	// Call the view file, capture it into the output buffer, and then return it.
	ob_start();
	include $config['view'];

	return ob_get_clean();
}

/*
 * Get the body (ip address) of an http response request.
 *
 * @since 1.0.0
 * @param array $attributes Combined and filtered attribute list.
 *
 * @return array $request   The http request response.
 */
function get_remote_ip_address( $attributes ) {
	$request = wp_remote_get( $attributes['url'] );

	return $request['body'];
}
