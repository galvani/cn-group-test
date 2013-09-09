<?php
namespace CNCalculator\Test;
use CNCalculator\Processor;

/**
 * Created by JetBrains PhpStorm.
 * User: jan
 * Date: 9/9/13
 * Time: 11:55 AM
 * To change this template use File | Settings | File Templates.
 */

class ProcessorTest extends \PHPUnit_Framework_TestCase {
	/** @var  Processor */
	private static $processor;

	public static function setUpBeforeClass() {
		self::$processor = new Processor();
	}

	public function testMultiply()
	{
		$this->assertTrue(self::$processor->process(array('multiply 5','apply 6'))==30);
	}

	public function testAdd()
	{
		$this->assertTrue(self::$processor->process(array('add 5','apply 6'))==11);
	}

	public function testDeduct()
	{
		$this->assertTrue(self::$processor->process(array('deduct 5','apply 6'))==1);
	}

	public function testDivide()
	{
		$this->assertTrue(self::$processor->process(array('divide 5','apply 50'))==10);
	}
}
