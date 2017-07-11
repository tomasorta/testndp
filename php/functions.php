<?php

########################
###  EDIT THIS FILE  ###
########################

// read from "input.json" and return as an array
function load_input_file_into_php_array() {
  $jsondata=file_get_contents("data/input.json");
  $input_array=json_decode($jsondata,true);
  return $input_array;
  print "Loading...\n";
}
// convert array to match structure in "correct-output.json"
function convert_array_to_output_format($input_array) {
  //var_dump($input_array);
  //die();
  $output_array=array();
  foreach ($input_array as $k=>$v)
   {
    foreach ($v as $k1=>$v1)
    {
      foreach($v1 as $k2=>$v2)
      {
        $output_array[]=array('name'=>$v2["EnglishName"],'latin'=>$v2["Species"],'lifespan'=>$v2["Lifespan"]);
      }
    }
  }

  print "Converting...\n";
    return $output_array;
}

// save the array to file named "my-output.json"
function save_php_array_to_output_file($output_array) {
  $dt=json_encode($output_array,JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP);

  file_put_contents("data/my-output.json",$dt);
  print "Saving...\n";
}

########################################################################
###  Note: Final "my-output.json" file should match structure of     ###
###  "correct-output.json" - but, whitespace does NOT have to match. ###
########################################################################

########################################################################
###  Tip - Look at these built-in PHP functions:                     ###
###  json_encode, json_decode, file_put_contents, file_get_contents  ###
########################################################################
