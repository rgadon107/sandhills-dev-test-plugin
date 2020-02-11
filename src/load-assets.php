<?php
/**
 *  Description
 *
 * @package    spiralWebDB\Sandhills
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills\Assets;

use function spiralWebDB\Sandhills\_get_plugin_directory;
// User passes a url to the shortcode.
// URL is passed to a function that makes an HTTP request.
// Function returns the body of the HTTP response request and renders via shortcode.
// Returned HTTP response request value is passed to transient database option in 'wp_options' table.

