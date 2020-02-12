<?php
/**
 * Common functionality to bootstrap PHPUnit test suites.
 *
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @package    spiralWebDB\Sandhills
 * @link       http://spiralwebdb.com
 * @license    GNU-2.0+
 */

namespace spiralWebDB\Sandhills\Tests;

/**
 * Initialize the test suite.
 *
 * @since 1.0.0
 *
 * @param string $test_suite Directory name of the test suite. Default is 'Unit'.
 */
function init_test_suite( $test_suite = 'Unit' ) {
	init_constants( $test_suite );

	check_readiness();

	// Load the Composer autoloader.
	require_once SANDHILL_DEV_PLUGIN_ROOT_DIR . '/vendor/autoload.php';
	require_once __DIR__ . '/TestCaseTrait.php';

	// Load Patchwork before everything else in order to allow us to redefine WordPress, 3rd party, or any other non-native PHP functions.
	require_once SANDHILL_DEV_PLUGIN_ROOT_DIR . '/vendor/antecedent/patchwork/Patchwork.php';
}

/**
 * Check the system's readiness to run the tests.
 *
 * @since 1.0.0
 */
function check_readiness() {
	if ( version_compare( phpversion(), '5.6.0', '<' ) ) {
		trigger_error( 'Test Suite requires PHP 5.6 or higher.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
	}

	if ( ! file_exists( SANDHILL_DEV_PLUGIN_ROOT_DIR . '/vendor/autoload.php' ) ) {
		trigger_error( 'Whoops, we need Composer before we start running tests.  Please type: `composer install`.  When done, try running `phpunit` again.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
	}
}

/**
 * Initialize the constants.
 *
 * @since 1.0.0
 *
 * @param string $test_suite_folder Directory name of the test suite.
 */
function init_constants( $test_suite_folder ) {
	define( 'SANDHILL_DEV_PLUGIN_ROOT_DIR', dirname( __DIR__ ) );
	define( 'SANDHILL_DEV_TEST_ROOT_DIR', __DIR__ );
	define( 'SANDHILL_DEV_TESTS_DIR', SANDHILL_DEV_TEST_ROOT_DIR . $test_suite_folder );

	if ( 'Unit' === $test_suite_folder && ! defined( 'ABSPATH' ) ) {
		define( 'ABSPATH', SANDHILL_DEV_PLUGIN_ROOT_DIR );
	}
}

