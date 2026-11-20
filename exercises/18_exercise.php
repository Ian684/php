<?php
$exercise = 18;
$topic = "queue";
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
echo "49af16344729-51".PHP_EOL;
echo "49af16344729-52".PHP_EOL;
echo "49af16344729-53".PHP_EOL;
echo "49af16344729-54".PHP_EOL;
echo "49af16344729-55".PHP_EOL;
echo "49af16344729-56".PHP_EOL;
echo "49af16344729-57".PHP_EOL;
echo "49af16344729-58".PHP_EOL;
echo "49af16344729-59".PHP_EOL;
echo "49af16344729-60".PHP_EOL;
echo "49af16344729-61".PHP_EOL;
echo "49af16344729-62".PHP_EOL;
echo "49af16344729-63".PHP_EOL;
echo "49af16344729-64".PHP_EOL;
echo "49af16344729-65".PHP_EOL;
echo "49af16344729-66".PHP_EOL;
echo "49af16344729-67".PHP_EOL;
echo "49af16344729-68".PHP_EOL;
echo "49af16344729-69".PHP_EOL;
echo "49af16344729-70".PHP_EOL;
echo "49af16344729-71".PHP_EOL;
echo "49af16344729-72".PHP_EOL;
echo "49af16344729-73".PHP_EOL;
echo "49af16344729-74".PHP_EOL;
echo "49af16344729-75".PHP_EOL;
echo "49af16344729-76".PHP_EOL;
echo "49af16344729-77".PHP_EOL;
echo "49af16344729-78".PHP_EOL;
echo "49af16344729-79".PHP_EOL;
?>