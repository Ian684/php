<?php
// PHP exercise 33

$exercise = 33;
$values = [12, 7, 19, 3, 25];
$sum = array_sum($values);
$largest = max($values);

echo "Exercise " . $exercise . PHP_EOL;
echo "Values: " . implode(", ", $values) . PHP_EOL;
echo "Sum: " . $sum . PHP_EOL;
echo "Largest: " . $largest . PHP_EOL;
