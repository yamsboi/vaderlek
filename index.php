<?php
// require "conn.php";



$filename = "weather_data.csv";

// The nested array that holds the other arrays 
$weatherDataArr = [];


// Open the file for reading
if (($h = fopen($filename, "r")) !== FALSE) 
{
  // Convert each line into the local $data variable
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {		
      $weatherDataArr[] = $data;
  }

  // Close the file
  fclose($h);
}
// var_dump($weatherDataArr);

// Converts every array object to UTF-8 from UTF-16
for ($i = 0; $i < count($weatherDataArr); $i++) {
  $results[$i] = mb_convert_encoding($weatherDataArr[$i], "UTF-8", "UTF-16");
}
// var_dump($results);

// Shifting the first element of the array and saving it to $header 
$header[] = array_shift($results);

// Explodes $header
$explodedHeader = explode("\t", $header[0][0]);

// Explodes $results
for ($i=0; $i < count($results); $i++) { 
  $str = $results[$i][$i-$i];
  $stripped[] = str_replace(" ", "", $str);
  $exploded[] = explode("\t", $stripped[$i]);
  // var_dump($stripped);
}

for ($i=0; $i < count($explodedHeader) ; $i++) { 
  # code...
  $newArr[$explodedHeader[$i]] = [];
  // var_dump($explodedHeader[$i]);
}


// Var_dump variables
echo "Trimmed";
// var_dump($stripped);

echo "Exploded header";
var_dump($explodedHeader);

echo "newArr";
// var_dump($newArr);

echo "Exploded";
var_dump($exploded);

echo "Original str";
// var_dump($str);

echo "Results";
// var_dump($results);
