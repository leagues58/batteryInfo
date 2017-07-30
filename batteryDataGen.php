<?php

  echo getmypid();

  $strInputFilename   = __DIR__ . '/data/data.csv';
  $strOutputFilename  = __DIR__ . '/data/live_battery_data.csv';


  // make sure the file exists and is readable
  if (!is_readable($strInputFilename)) {

    echo 'Could not find/read file.  Filename: ' . $strInputFilename;
    die();

  } else {

    // open the file
    if ($inputCSV = fopen($strInputFilename, "r")) {

      // open file where we're writing to
      $outputCSV = fopen($strOutputFilename, 'w');

      // for each row, get array containing csv fields
      while ($row = fgetcsv($inputCSV, 1000, ",")) {

        fputs($outputCSV, implode($row, ',')."\n");
        sleep(10);

      }
    }
      fclose($outputCSV);
      fclose($inputCSV);

  }


?>
