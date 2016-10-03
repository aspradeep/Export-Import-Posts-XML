<?php
/**
 * Class SampleTest
 *
 * @package Export_Import_Posts_Xml
 */

/**
 * Sample test case.
 */
 
use PHPUnit\Framework\TestCase;
 
class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	function test_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}
	
	public function testFailureWithDifferentNodeAttributes()
    {
        $expected = new DOMDocument;
        $expected->loadXML('<wxr/>');

        $actual = new DOMDocument;
        $actual->loadXML('<wxr/>');

        $this->assertEqualXMLStructure(
          $expected->firstChild, $actual->firstChild, true
        );
    }
}

