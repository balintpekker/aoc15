<?php
  //Advent of Code 2015 Day 10

  $in = "1113122113";

  for ($i = 0; $i <= 40; $i++) {
	  $in = preg_replace_callback('#(.)\1*#', function($x) { return strlen($x[0]).$x[0][0];}, $in);
  }

  echo "The length of the result is:" . strlen($in) . " (processed 40 times)";
  
  //Part 2
