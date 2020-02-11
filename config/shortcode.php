<?php
/**
 *  The shortcode runtime configuration parameters.
 *
 * @package    spiralWebDB\Sandhills
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills;

return array(

	/**=================================================
	 *
	 * Shortcode name. The name within the square brackets.
	 *
	 *==================================================*/
	'shortcode_name'              => 'fezziwig',

	/**=================================================
	 *
	 * Specify if you want do_shortcode() to run on the
	 * content between the shortcode opening and closing
	 * square brackets. Defaults to 'true'.
	 *
	 *==================================================*/
	'do_shortcode_within_content' => true,

	/**=================================================
	 *
	 * Specify the processing function when you want
	 * your code to handle the output buffer, view, and
	 * processing.  Defaults to null.
	 *
	 *==================================================*/
	'processing_function'         => __NAMESPACE__ . '\process_the_shortcode',
	/**=================================================
	 *
	 * The absolute path to the view file. If more than
	 * one, use an array of view files.
	 *
	 *==================================================*/
	'view'                        => _get_plugin_url() . '/src/shortcode/views/shortcode.php',

	/**=================================================
	 *
	 *  Defined shortcode default attributes. Each is
	 *  overridable by the author.
	 *
	 *==================================================*/
	'defaults'                    => [
		'url'       => '',
	],
);
