<?php
  //Advent of Code 2015 Day 5
  
  $in = file_get_contents("input.txt");
  $words = explode("\n", $in);
  $nice = 0;
  
  function hasDuplicate($string) {
	if (preg_match('/(.)\1/',$string) >= 1) { //Matching if a letter is followed by the same letter (or symbol by the same symbol).
	  return true;
	}		
  }
  
  function threeVowels($string) {
	if (preg_match_all("/[aeiou]/", $string) >= 3) { //Matching if any of 'aeiou' is present at least 3 times.
	  return true;
	}
  }
  function noBadStrings($string) {
	if (preg_match('/ab|cd|pq|xy/',$string) == 0) { //No matching.
		return true;
	}
  }
  
  foreach ($words as $word) {
	if (hasDuplicate($word) && threeVowels($word) && noBadStrings($word)) {
		$nice++;
	}
  }
  
  echo "There are " . $nice . " nice words.<br>";
  
  //Day 5 Part 2
  
  $nice = 0;
  
  function doubleDoubles($string) {
	if (preg_match('/(..).*\1/', $string) >= 1) {  //Any 2 letters followed by anything twice
	  return true;
	}
  }
  function oneLetterBetween($string) {
	if (preg_match('/(.).\1/', $string) >= 1) {  //Any letter, followed by anything, followed by the first letter.
	  return true;
	}
  }

  foreach ($words as $word) {
    if (doubleDoubles($word) && oneLetterBetween($word)) {
	  $nice++;
    }
  }
  
  echo "There are " . $nice . " nice words after Santa realized his mistake.";
  
