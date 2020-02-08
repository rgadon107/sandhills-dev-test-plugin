<?php
/**
 * Sandhills Development Test Plugin
 *
 * @package     spiralWebDB\Sandhills
 * @author      r_gadon
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:         Sandhills Development Test Plugin
 * Plugin URI:          https://github.com/KnowTheCode/sandhills-dev-test-plugin
 * Description:         A plugin to demonstrate knowledge and skill in the application of various WordPress APIs.
 * Version:             0.1
 * Requires at least:   5.1
 * Requires PHP:        5.6
 * Author:              Robert A Gadon
 * Author URI:          https://spiralwebdb.com
 * Text Domain:         sandhills-dev
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace spiralWebDB\Sandhills;

/**
 * Gets this plugin's absolute directory path.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_directory() {
	return __DIR__;
}

/**
 * Gets this plugin's URL.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_url() {
	static $plugin_url;

	if ( empty( $plugin_url ) ) {
		$plugin_url = plugins_url( null, __FILE__ );
	}

	return $plugin_url;
}

/**
 * Checks if this plugin is in development mode.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return bool
 */
function _is_in_development_mode() {
	return defined( WP_DEBUG ) && WP_DEBUG === true;
}

/**
 * Autoload the plugin's files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_files() {
	$files = [
		'asset/post-type.php',
		'asset/label-generator.php',
	];

	foreach ( $files as $file ) {
		require __DIR__ . '/src/' . $file;
	}
}

/**
 * Launch the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	autoload_files();
}

launch();
