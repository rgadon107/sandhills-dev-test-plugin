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

	add_shortcode( $config['shortcode_name'], __NAMESPACE__ . '\process_the_shortcode';
}

function process_the_shortcode() {

}


