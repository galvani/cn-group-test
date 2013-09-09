<?php

require 'autoload.php';

if (count($argv)==2) {
	$fileName = $argv[1];
} else {
	$fileName = dirname(__FILE__).'/test-data/data.txt';
}

$instructions = FILE($fileName);
$processor = new \CNCalculator\Processor();
echo $processor->process($instructions);

echo "\n";
exit(0);