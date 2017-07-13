<?php
/**
 * Author: Dragu Costel
 * Email : dragu.costel@yahoo.com
 * Date: 13.07.2017
 * Time: 21:30
 * File name: index.php
 */

echo '<pre>';
$time_start = microtime(TRUE);
echo 'Time has started' . PHP_EOL;
$array = [4, 40, 5, 6, 12, 3, 7, 8, 15, 20, 11];
shuffle($array);
echo 'Array was created and mixed' . PHP_EOL;
timePass($time_start);
$time_start = microtime(TRUE);
echo 'Start calculating' . PHP_EOL;
echo 'Response:' . calc($array) . PHP_EOL;
echo 'Array was calculated' . PHP_EOL;
timePass($time_start);


/**
 * @param array $array
 *
 * @return int|mixed
 */
function calc(array $array) {
  print_r($array);
  $firstBiggest = 0;
  $secondBiggest = 0;
  $max = 0;
  foreach ($array as $key => $value) {
    echo '--------v:' . $value . PHP_EOL;
    if ($key == 0) {
      echo 'First value:' . $value . PHP_EOL;
      $firstBiggest = $value;
      continue;
    }
    if ($value > $firstBiggest) {
      $secondBiggest = $firstBiggest;
      $firstBiggest = $value;
      echo 'First has change - $value:' . $value . ', $secondBiggest:' . $secondBiggest . ', $firstBiggest:' . $firstBiggest . PHP_EOL;
    }
    else {
      if ($value > $secondBiggest) {
        echo 'second value:' . $value . PHP_EOL;
        $secondBiggest = $value;
      }
    }
    $result = $firstBiggest * $secondBiggest;
    if ($result % 3 == 0 && $max < $result) {
      $max = $result;
      echo '$max has changed:' . $max . PHP_EOL;
    }
    else {
      echo '$max:' . $max . PHP_EOL;
    }

  }
  return $max;
}


/**
 * @param $time_start
 */
function timePass($time_start) {
  $time_end = microtime(TRUE);
  $execution_time = ($time_end - $time_start) / 60;

  //execution time of the script
  echo 'Total Execution Time:' . $execution_time . ' Mins' . PHP_EOL;
}