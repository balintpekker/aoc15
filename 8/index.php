<?php
  //Advent of Code 2015 Day 8
  
  $first = 0;
  $second = 0;
  
  $in = file('input.txt', FILE_IGNORE_NEW_LINES);

  foreach ($in as $line) {
	eval('$str = ' . $line . ';');
	
	$first += strlen($line) - strlen($str);
	$second += strlen(addslashes($line)) + 2 - strlen($line); 
  }
  echo "Day 8 Part 1 Answer: $first <br>";
  echo "Day 8 PArt 2 Answer: $second";
