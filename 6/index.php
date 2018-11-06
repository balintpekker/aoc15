<?php
  //Advent of Code 2015 Day 6
  ini_set('memory_limit', '2048M');

  $in = file_get_contents("input.txt");
  $instructions = explode("\n", $in);
  
  $grid = [];
  
  for($x = 0; $x <= 999; $x++) { //Generating the grid 
	for($y = 0; $y <= 999; $y++) {
	  $grid[$x][$y]['bulbs'] = 0;
      $grid[$x][$y]['brightness'] = 0;
	}
  }

  foreach($instructions as $instruction) {	//Instructions
    preg_match('/([a-z|\s]*) (\d{1,},\d{1,}) through (\d{1,3},\d{1,3})/', $instruction, $matches);
	
	$start = explode(",", $matches[2]);
	$end = explode(",", $matches[3]);
	
	for($x = $start[0]; $x <= $end[0]; $x++) {
	  for($y = $start[1]; $y <= $end[1]; $y++) {
		switch($matches[1]) {  
		  case 'turn on':
			$grid[$x][$y]['bulbs'] = 1;
			$grid[$x][$y]['brightness']++;
			break;
		  case 'turn off':
			$grid[$x][$y]['bulbs'] = 0;
			$grid[$x][$y]['brightness'] = $grid[$x][$y]['brightness'] <= 1 ? 0 : ($grid[$x][$y]['brightness'] - 1);
			break;
		  case 'toggle':
			$grid[$x][$y]['bulbs'] = $grid[$x][$y]['bulbs'] === 1 ? 0 : 1;
			$grid[$x][$y]['brightness'] = $grid[$x][$y]['brightness'] + 2;
			break;
		  }
		}
	  }
  }

  $bulbsOn = 0;
  $totalBrightness = 0;

  for ($x = 0; $x <= 999; $x++) {
	for ($y = 0; $y <= 999; $y++) {
      $totalBrightness = $totalBrightness + $grid[$x][$y]['brightness'];
      if ($grid[$x][$y]['bulbs'] == 1) {
        $bulbsOn += 1;
      }
	}
  }        

  echo $bulbsOn . " bulbs are turned on.<br>";
  echo "The total brightness is: ". $totalBrightness;
