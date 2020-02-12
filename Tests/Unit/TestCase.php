<?php
/**
 * TestCase for the unit tests.
 *
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @package    spiralWebDB\Sandhills
 * @link       http://spiralwebdb.com
 * @license    GNU-2.0+
 */

namespace spiralWebDB\Sandhills\Tests\Unit;

use Brain\Monkey;
use Brain\Monkey\Functions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use spiralWebDB\Sandhills\Tests\TestCaseTrait;

/**
 * Class TestCase.
 *
 * @package spiralWebDB\Sandhills\Tests\Unit
 */
abstract class TestCase extends PHPUnitTestCase {
	use TestCaseTrait;
	use MockeryPHPUnitIntegration;

	/**
	 * Prepares the test environment before each test.
	 */
	protected function setUp() {
		parent::setUp();
		Monkey\setUp();

		$this->mockCommonWpFunctions();
	}

	/**
	 * Cleans up the test environment after each test.
	 */
	protected function tearDown() {
		Monkey\tearDown();
		parent::tearDown();
	}


	/**
	 * Mock common WP functions.
	 */
	protected function mockCommonWpFunctions() {
		Functions\stubs(
			[
				'__',
				'esc_attr__',
				'esc_html__',
				'_x',
				'esc_attr_x',
				'esc_html_x',
				'_n',
				'_nx',
				'esc_attr',
				'esc_html',
				'esc_textarea',
				'esc_url',
			]
		);

		$functions = [
			'_e',
			'esc_attr_e',
			'esc_html_e',
			'_ex',
		];

		foreach ( $functions as $function ) {
			Functions\when( $function )->echoArg();
		}
	}
}

