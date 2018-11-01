<?php
  //Advent of Code 2015 Day 2

  $in = file_get_contents("input.txt");
  $presents = explode("\n", $in);
  $paper = 0;
  $ribbon = 0;
  
  foreach ($presents as $present) {
	  $dimensions = explode("x", $present);
	  
	  list($length, $width, $height) = array_pad($dimensions, 3, null); //Limiting the size of the array returned by 'explode()' to 3 with 'array_pad()'. Also appending 'null' until the array contains 3 values.
	  
	  $surfaces = [
	    $length * $width,
		$width * $height,
		$height * $length
	  ];
	  
	  // Day 2 Part 2
	  $extra = [
		$length + $width,
		$width + $height,
		$height + $length
	  ];
	  
	  $bow = ($length * $width * $height);
	  
	  $paper += array_sum($surfaces) * 2 + min($surfaces);
	  $ribbon += $bow + min($extra) * 2; 
  }
  
  echo "The elves should order ".$paper." total square feet of wrapping paper.<br>";
  echo "The elves should order ".$ribbon." total square feet of ribbon as well.";
