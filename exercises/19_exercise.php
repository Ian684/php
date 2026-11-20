<?php
$exercise = 19;
$topic = "matrix";
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
echo "f8c117331e16-51".PHP_EOL;
echo "f8c117331e16-52".PHP_EOL;
echo "f8c117331e16-53".PHP_EOL;
echo "f8c117331e16-54".PHP_EOL;
echo "f8c117331e16-55".PHP_EOL;
echo "f8c117331e16-56".PHP_EOL;
echo "f8c117331e16-57".PHP_EOL;
echo "f8c117331e16-58".PHP_EOL;
echo "f8c117331e16-59".PHP_EOL;
echo "f8c117331e16-60".PHP_EOL;
echo "f8c117331e16-61".PHP_EOL;
echo "f8c117331e16-62".PHP_EOL;
echo "f8c117331e16-63".PHP_EOL;
echo "f8c117331e16-64".PHP_EOL;
echo "f8c117331e16-65".PHP_EOL;
echo "f8c117331e16-66".PHP_EOL;
echo "f8c117331e16-67".PHP_EOL;
echo "f8c117331e16-68".PHP_EOL;
echo "f8c117331e16-69".PHP_EOL;
echo "f8c117331e16-70".PHP_EOL;
echo "f8c117331e16-71".PHP_EOL;
echo "f8c117331e16-72".PHP_EOL;
echo "f8c117331e16-73".PHP_EOL;
echo "f8c117331e16-74".PHP_EOL;
echo "f8c117331e16-75".PHP_EOL;
echo "f8c117331e16-76".PHP_EOL;
echo "f8c117331e16-77".PHP_EOL;
echo "f8c117331e16-78".PHP_EOL;
echo "f8c117331e16-79".PHP_EOL;
?>