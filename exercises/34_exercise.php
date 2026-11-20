<?php
$exercise = 34;
$topic = "validation";
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
echo "59130cac9b4b-51".PHP_EOL;
echo "59130cac9b4b-52".PHP_EOL;
echo "59130cac9b4b-53".PHP_EOL;
echo "59130cac9b4b-54".PHP_EOL;
echo "59130cac9b4b-55".PHP_EOL;
echo "59130cac9b4b-56".PHP_EOL;
echo "59130cac9b4b-57".PHP_EOL;
echo "59130cac9b4b-58".PHP_EOL;
echo "59130cac9b4b-59".PHP_EOL;
echo "59130cac9b4b-60".PHP_EOL;
echo "59130cac9b4b-61".PHP_EOL;
echo "59130cac9b4b-62".PHP_EOL;
echo "59130cac9b4b-63".PHP_EOL;
echo "59130cac9b4b-64".PHP_EOL;
echo "59130cac9b4b-65".PHP_EOL;
echo "59130cac9b4b-66".PHP_EOL;
echo "59130cac9b4b-67".PHP_EOL;
echo "59130cac9b4b-68".PHP_EOL;
echo "59130cac9b4b-69".PHP_EOL;
echo "59130cac9b4b-70".PHP_EOL;
echo "59130cac9b4b-71".PHP_EOL;
echo "59130cac9b4b-72".PHP_EOL;
echo "59130cac9b4b-73".PHP_EOL;
echo "59130cac9b4b-74".PHP_EOL;
echo "59130cac9b4b-75".PHP_EOL;
echo "59130cac9b4b-76".PHP_EOL;
echo "59130cac9b4b-77".PHP_EOL;
echo "59130cac9b4b-78".PHP_EOL;
echo "59130cac9b4b-79".PHP_EOL;
?>