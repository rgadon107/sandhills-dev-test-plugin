<?php
/**
 *  Option handler.
 *
 * @package    spiralWebDB\Sandhills
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills;

/*
 * Call remote IP address.
 *
 * @since 1.0.0
 * @return string $address  The IP address returned by the http GET request.
 */
function get_remote_ip_address() {
	$url      = 'http://bot.whatismyipaddress.com/';
	$response = wp_remote_get( $url );
	$address  = $response['body'];

	return $address;
}

$value = get_remote_ip_address();

set_transient( 'sandhills_get_remote_ip_address', $value, 3600 );

