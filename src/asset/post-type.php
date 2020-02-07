<?php
/**
 *  Register custom post type
 *
 * @package    ${NAMESPACE}
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */
namespace spiralWebDB\Sandhills\Asset;

use function spiralWebDB\Sandhills\_get_plugin_directory;

// Requirements for registering the custom post type.
// Register a custom post type with WordPress on the init hook.
// Set $args['public'] = true;
// Set $args['exclude_from_search'] = false; (by default, setting is opposite of $args['public']
// Set $args['publicly_queryable'] = true; ( If not set, the default is inherited from $public. )

add_action ( 'init', __NAMESPACE__ . '\register_custom_post_type' );
/**
 * Register a custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_post_type() {
	$config = require_once _get_plugin_directory() . '/config/post-type.php';

	register_the_custom_post_type( $post_type, $config );
}

function register_the_custom_post_type( $post_type, (array) $config ) {

}
