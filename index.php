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
$array = range(0,100);
shuffle($array);
echo 'Array was created and mixed' . PHP_EOL;
timePass($time_start);
$time_start = microtime(TRUE);
echo 'Start calculating' . PHP_EOL;
echo 'Response:' . calc($array, 5) . PHP_EOL;
echo 'Array was calculated' . PHP_EOL;
timePass($time_start);


/**
 * @param array $array
 *
 * @return int|mixed
 * TODO - Bad approach
 */
function calcOld(array $array) {
  print_r($array);
  $firstBiggest = $array[0];
  $count = count($array);
  $secondBiggest = 0;
  $max = 0;
  for ($x = 1; $x < $count; ++$x) {
    $value = $array[$x];
    echo '--------v:' . $value . PHP_EOL;

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
 * @param array $array
 * @param int $modulo
 *
 * @return int|mixed
 */
function calc(array $array, $modulo  = 3) {
  print_r($array);
  $firstBiggest = 0;
  $count = count($array);
  $secondBiggest = 0;
  for ($x = 0; $x < $count; ++$x) {
    $value = $array[$x];
    echo '--------v:' . $value . PHP_EOL;
    if($value % $modulo == 0 && $firstBiggest < $value) {
      $firstBiggest = $value;
      echo 'First has change $firstBiggest:' . $firstBiggest . PHP_EOL;
    }
    if ($value > $secondBiggest && $value != $firstBiggest) {
      $secondBiggest = $value;
      echo 'Second value $secondBiggest:' . $value . PHP_EOL;
    }
  }
  return $firstBiggest * $secondBiggest;
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