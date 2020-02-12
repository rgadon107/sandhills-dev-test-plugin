<?php
/**
 * TestCase for the integration tests.
 *
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @package    spiralWebDB\Sandhills
 * @link       http://spiralwebdb.com
 * @license    GNU-2.0+
 */

namespace spiralWebDB\Sandhills\Tests\Integration;

use Brain\Monkey;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use spiralWebDB\Sandhills\Tests\TestCaseTrait;
use WP_UnitTestCase;

/**
 * Class TestCase.
 *
 * @package spiralWebDB\Sandhills\Tests\Integration
 */
abstract class TestCase extends WP_UnitTestCase {
	use TestCaseTrait;
	use MockeryPHPUnitIntegration;

	/**
	 * Prepares the test environment before each test.
	 */
	public function setUp() {
		parent::setUp();
		Monkey\setUp();
	}

	/**
	 * Cleans up the test environment after each test.
	 */
	public function tearDown() {
		Monkey\tearDown();
		parent::tearDown();
	}
}

