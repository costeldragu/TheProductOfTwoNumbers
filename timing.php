<?php
/**
 * Author: Dragu Costel
 * Email : dragu.costel@yahoo.com
 * Date: 13.07.2017
 * Time: 21:57
 * File name: timing.php
 */

echo '<pre>';
//place this before any script you want to calculate time
$time_start = microtime(TRUE);
echo 'Time has started' . PHP_EOL;
$big_array = array_fill(0, 1000000, (int) rand(0, 1000000));
shuffle($big_array);
echo 'Array was created and mixed' . PHP_EOL;
timePass($time_start);

$time_start = microtime(TRUE);
echo 'Executing On with foreach' . PHP_EOL;
foreach ($big_array as $key=> $value) {}
echo 'On foreach finished' . PHP_EOL;
timePass($time_start);

$time_start = microtime(TRUE);
echo 'Executing On with array_sort' . PHP_EOL;
asort($big_array);
echo 'On array_sort finished' . PHP_EOL;
timePass($time_start);



function timePass($time_start) {
  $time_end = microtime(TRUE);
  $execution_time = ($time_end - $time_start) / 60;

  //execution time of the script
  echo 'Total Execution Time:' . $execution_time . ' Mins'.PHP_EOL;
}