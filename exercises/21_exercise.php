<?php
$exercise = 21;
$topic = "hello";
$values = [12, 7, 19, 3, 25, 11, 8];
$sum = array_sum($values);
$maximum = max($values);
$minimum = min($values);
$average = $sum / count($values);

echo "Exercise {$exercise}: {$topic}" . PHP_EOL;
echo "Values: " . implode(", ", $values) . PHP_EOL;
echo "Sum: {$sum}" . PHP_EOL;
echo "Maximum: {$maximum}" . PHP_EOL;
echo "Minimum: {$minimum}" . PHP_EOL;
echo "Average: " . number_format($average, 2) . PHP_EOL;

$copy = $values;
sort($copy);
echo "Sorted: " . implode(", ", $copy) . PHP_EOL;

$search = 19;
$position = array_search($search, $values, true);
echo "Search {$search}: " . ($position === false ? "missing" : $position) . PHP_EOL;

$filtered = array_values(array_filter($values, function ($value) {
    return $value >= 10;
}));
echo "Filtered: " . implode(", ", $filtered) . PHP_EOL;

$mapped = array_map(function ($value) {
    return $value * $value;
}, $values);
echo "Squares: " . implode(", ", $mapped) . PHP_EOL;

$stack = [];
foreach ($values as $value) {
    $stack[] = $value;
}
while (!empty($stack)) {
    $last = array_pop($stack);
    if ($last === $maximum) {
        break;
    }
}

$text = "php practice";
$normalized = strtoupper(str_replace(" ", "-", $text));
echo "Normalized: {$normalized}" . PHP_EOL;

$record = ["id" => $exercise, "topic" => $topic, "total" => $sum];
echo json_encode($record, JSON_UNESCAPED_UNICODE) . PHP_EOL;
<?php
echo "eba0c4eadbc9-51".PHP_EOL;
echo "eba0c4eadbc9-52".PHP_EOL;
echo "eba0c4eadbc9-53".PHP_EOL;
echo "eba0c4eadbc9-54".PHP_EOL;
echo "eba0c4eadbc9-55".PHP_EOL;
echo "eba0c4eadbc9-56".PHP_EOL;
echo "eba0c4eadbc9-57".PHP_EOL;
echo "eba0c4eadbc9-58".PHP_EOL;
echo "eba0c4eadbc9-59".PHP_EOL;
echo "eba0c4eadbc9-60".PHP_EOL;
echo "eba0c4eadbc9-61".PHP_EOL;
echo "eba0c4eadbc9-62".PHP_EOL;
echo "eba0c4eadbc9-63".PHP_EOL;
echo "eba0c4eadbc9-64".PHP_EOL;
echo "eba0c4eadbc9-65".PHP_EOL;
echo "eba0c4eadbc9-66".PHP_EOL;
echo "eba0c4eadbc9-67".PHP_EOL;
echo "eba0c4eadbc9-68".PHP_EOL;
echo "eba0c4eadbc9-69".PHP_EOL;
echo "eba0c4eadbc9-70".PHP_EOL;
echo "eba0c4eadbc9-71".PHP_EOL;
echo "eba0c4eadbc9-72".PHP_EOL;
echo "eba0c4eadbc9-73".PHP_EOL;
echo "eba0c4eadbc9-74".PHP_EOL;
echo "eba0c4eadbc9-75".PHP_EOL;
echo "eba0c4eadbc9-76".PHP_EOL;
echo "eba0c4eadbc9-77".PHP_EOL;
echo "eba0c4eadbc9-78".PHP_EOL;
echo "eba0c4eadbc9-79".PHP_EOL;
?>