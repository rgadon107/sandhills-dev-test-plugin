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

/*
 * Register a WordPress shortcode
 *
 * @since 1.0.0
 */
add_shortcode( 'feature' , __NAMESPACE__ . '\process_product_feature_shortcode' );

/*
 * Processing callback for the [feature] shortcode.
 *
 * @since 1.0.0.
 */
function process_product_feature_shortcode() {

	ob_start();
	include '/view/shortcode.php';
	ob_get_clean();
}

