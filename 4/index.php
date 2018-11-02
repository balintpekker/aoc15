<?php
  //Advent of Code 2015 Day 4
  
  $str = "yzbqklnj";
  $number = 0;
  $found = false;

  while(!$found) {
    if (substr(md5($str . $number), 0, 5) === "00000") {
	    $found = true;
    } else {
	    $number++;
    }
  }
  
  echo "The number you are looking for is: " . $number . "<br>";
  
  // Day 4 Part 2
  
  $number = 0;
  $found = false;
  
  while(!$found) {
    if (substr(md5($str . $number), 0, 6) === "000000") {
	    $found = true;
    } else {
	    $number++;
    }
  }
  
  echo "The number you are looking for is: " . $number . "<br>";
