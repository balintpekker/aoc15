<?php
  //Advent of Code 2015 Day 7

  $wires = [];
  $operators = [
	'AND' => '&', 
	'OR' => '|', 
	'NOT' => '~', 
	'RSHIFT' => '>>', 
	'LSHIFT' => '<<'
  ];

  foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $line) {
	list ($k, $v) = explode(' -> ', $line);
	$wires[$v] = $k;
  }
  
  //Recursive function
  function f($w) {
	global $wires;
	
	if (!isset($wires[$w])) {
	  return $w;
	}
	
	if (strpos($wires[$w], ' ') !== false) {
	  eval('$wires[$w] = (' . preg_replace_callback('#(([a-z0-9]+) )?([A-Z]+) ([a-z0-9]+)#', function ($p) {
		return f($p[2]) . $GLOBALS['operators'][$p[3]] . f($p[4]);
	  }, $wires[$w]) . ' & 65535);');
	}
	
	return f($wires[$w]);
  }
  
  $wires['b'] = 46065; // Day 7 Part 1
  
  echo $wires["b"] . " is ultimately provided to wire 'a'.<br>";  
  echo "After reseting the wires the new signal provided to wire 'a' is: " . f('a'); // Day 7 Part 2
