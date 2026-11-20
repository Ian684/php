<?php
// PHP exercise 09

$exercise = 9;
$values = [12, 7, 19, 3, 25];
$sum = array_sum($values);
$largest = max($values);

echo "Exercise " . $exercise . PHP_EOL;
echo "Values: " . implode(", ", $values) . PHP_EOL;
echo "Sum: " . $sum . PHP_EOL;
echo "Largest: " . $largest . PHP_EOL;
