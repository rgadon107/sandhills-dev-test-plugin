<?php
/**
 *  Helper functions to load the correct plugin template.
 *
 * @package    spiralWebDB\Sandhills\Template
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills\Template;

add_filter( 'single_template', __NAMESPACE__ . '\load_the_single_product_template' );
/*
 * Template loading between the plugin or theme.
 *
 * @since 1.0.0
 *
 * @param string    $single_template    Empty string.
 * @return string                       Relative path to the single template file to load.
 */
function load_the_single_product_template( $single_template ) {

	if ( ! post_type_exists( 'product' ) ) {
		return $single_template;
	}

	$template_file = 'single-product.php';

	$theme_file = locate_template( $template_file );

	if ( $theme_file && is_readable( $theme_file ) ) {
		return $theme_file;
	}

	return __DIR__ . '/single-product.php';
}
