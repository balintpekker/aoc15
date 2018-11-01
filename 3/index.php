<?php
  //Advent of Code 2015 Day 3

  $in = file_get_contents("input.txt");
  $start = [[0,0]];
  
  for ($i = 0; $i < strlen($in); $i++) {
	  $seq = $in[$i];
	  
	  switch($seq) {
		  case '^':
		    $start[] = [$start[$i][0] + 1, $start[$i][1]];
		    break;
		  case 'v':
		    $start[] = [$start[$i][0] - 1, $start[$i][1]];
		    break;
		  case '<':
		    $start[] = [$start[$i][0], $start[$i][1] - 1];
		    break;
		  case '>':
		    $start[] = [$start[$i][0], $start[$i][1] + 1];
		    break;
	  }
  }
  $houses = count(array_unique($start, SORT_REGULAR));
  echo "Santa has been bringing presents to " . $houses ." houses.<br>";
  
  //Day 3 Part 2
  $start['santa'] = [[0,0]];
  $start['robo'] = [[0,0]];
  
  for ($i = 0; $i < strlen($in); $i++) {
	  $seq = $in[$i];
	  
	  if ($i % 2 == 0) { //If remainder of $i divided by 2 is 0 then it's Santa's turn.
	    $suffix = "santa";
	  } else {
		$suffix = "robo";
	  }
	  
	  $end = end($start[$suffix]);
	  
	  switch($seq) {
	    case '^':
		  $start[$suffix][$i] = [$end[0] + 1, $end[1]];
		  break;
	    case 'v':
          $start[$suffix][$i] = [$end[0] - 1, $end[1]];
		  break;
	    case '<':
		  $start[$suffix][$i] = [$end[0], $end[1] - 1];
		  break;
	    case '>':
		  $start[$suffix][$i] = [$end[0], $end[1] + 1];
		  break;
	  }
  }
  
  echo "Santa & Robo-Santa visited ". count(array_unique($start['santa'] + $start['robo'], SORT_REGULAR)) ." houses.";
