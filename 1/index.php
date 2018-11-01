<?php
  $in = file_get_contents("input.txt");
  $floor = 0;
  $basement = false;
  
  for ($i = 0; $i < strlen($in); $i++) {
    if ($in[$i] === "(") {
      $floor += 1;
    } elseif ($in[$i] === ")") {
      $floor -= 1;
    }
	
    // Day 1 Part 2
    if ($floor === -1 && !$basement) {
      $basement = true;
        
      echo "Santa has entered the basement for the first time. (". ($i+1) .")<br>";
    }
  }
  
  echo "Santa is on the floor " . $floor .".";
