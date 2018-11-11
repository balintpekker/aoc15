<?php
  //Advent of Code 2015 Day 9
  
  $allDists = $dists = $cities = [];
  $in = file('input.txt', FILE_IGNORE_NEW_LINES);

  foreach($in as $line) {
    preg_match('/^(\S+) to (\S+) = (\d+)$/', $line, $matches);
    list(, $cityFrom, $cityTo, $dist) = $matches;
	
    array_push($cities, $cityFrom, $cityTo);

    if (!isset($dists[$cityFrom])) $dists[$cityFrom] = [];
    if (!isset($dists[$cityTo])) $dists[$cityTo] = [];
	
    $dists[$cityFrom][$cityTo] = $dists[$cityTo][$cityFrom] = $dist;
  }

  //Function to get all permutations 
  function perms($a) {
    $result = [];

    $recurse = function($a, $start_i = 0) use (&$result, &$recurse) {
      if ($start_i === count($a)-1) {
        array_push($result, $a);
      }

      for ($i = $start_i; $i < count($a); $i++) {
        //Swapping array value of $i and $start_i
        $t = $a[$i]; 
		$a[$i] = $a[$start_i]; 
		$a[$start_i] = $t;

        //Recursing
        $recurse($a, $start_i + 1);

        //Restoring old order
        $t = $a[$i]; 
		$a[$i] = $a[$start_i]; 
		$a[$start_i] = $t;
      }
    };

    $recurse($a);
    return $result;
  }

  $perms = perms(array_values(array_unique($cities)));

  foreach ($perms as $perm) {
    $total = 0;
    
	for ($i=0; $i<count($perm)-1; $i++) {
      $total += $dists[$perm[$i]][$perm[$i+1]];
    }
	
    array_push($allDists, $total);
  }

  echo "The distance of the shortest route is: " . min($allDists) . "<br>"; //Day 9 Part 1
  echo "The distance of the longest route is : " . max($allDists); //Day 9 Part 2
