<?php

namespace CNCalculator;

/**
 * Class Processor
 *
 * @author jan kozak <jan@galvani.cz>
 * @package CNCalculator
 */
class Processor {
	/** @var array  */
	protected $availableInstructions = array('add', 'multiply', 'deduct', 'divide');
	/** @var float */
	private $root;

	/**
	 * Processes given set of instructions
	 *
	 * @param array $instructionsArray
	 * @return mixed
	 * @throws \InvalidArgumentException
	 */
	public function process(array $instructionsArray) {
		$this->root = str_replace('apply ', '', array_pop($instructionsArray));

		foreach ($instructionsArray as $instruction) {
			$instructionObj = explode(' ',$instruction);
			if (!in_array($instructionObj[0], $this->availableInstructions)) {
				throw new \InvalidArgumentException('unknown instruction: '.$instruction);
			}

			$this->root = $this->$instructionObj[0]($instructionObj[1]);
		}



		return $this->root;
	}

	/**
	 * @param $number
	 * @return float
	 */
	private function multiply($number) { return $this->root * $number; }

	/**
	 * @param $number
	 * @return float
	 */
	private function add($number) { return $this->root + $number; }

	/**
	 * @param $number
	 * @return float
	 */
	private function deduct($number) { return $this->root - $number; }

	/**
	 * @param $number
	 * @return float
	 */
	private function divide($number) { return $this->root / $number; }
}