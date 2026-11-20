<?php
declare(strict_types=1);
$exercise = 29;
$topic = "filter-validation";
$values = [12, 7, 19, 3, 25, 11, 8];
$record = ["id" => $exercise, "topic" => $topic, "active" => true];
$multiplied = array_map(fn(int $value): int => $value * $exercise, $values);
$squares = [];
foreach ($values as $value) {
    $squares[] = $value * $value;
}
$even = array_values(array_filter($values, fn(int $value): bool => $value % 2 === 0));
$odd = array_values(array_filter($values, fn(int $value): bool => $value % 2 !== 0));
$sum = array_sum($values);
$maximum = max($values);
$minimum = min($values);
$average = $sum / count($values);
sort($values, SORT_NUMERIC);
$target = 19;
$position = array_search($target, $values, true);
$copy = $values;
rsort($copy, SORT_NUMERIC);
echo "Exercise {$exercise}: {$topic}" . PHP_EOL;
echo "Mechanism: " . __FUNCTION__ . PHP_EOL;
echo "Sum={$sum} Maximum={$maximum} Minimum={$minimum} Average=" . number_format($average, 2) . PHP_EOL;
echo "Ascending=" . implode(",", $values) . PHP_EOL;
echo "Descending=" . implode(",", $copy) . PHP_EOL;
echo "Multiplied=" . implode(",", $multiplied) . PHP_EOL;
echo "Squares=" . implode(",", $squares) . PHP_EOL;
echo "Even=" . implode(",", $even) . PHP_EOL;
echo "Odd=" . implode(",", $odd) . PHP_EOL;
echo "Target={$target} Position=" . ($position === false ? "missing" : (string)$position) . PHP_EOL;
echo "Record=" . json_encode($record, JSON_UNESCAPED_UNICODE) . PHP_EOL;
$normalized = strtoupper(str_replace("-", "_", $topic));
echo "Normalized={$normalized}" . PHP_EOL;
$checksum = hash("sha256", $topic . ":" . $sum);
echo "Checksum={$checksum}" . PHP_EOL;
$chunked = array_chunk($values, 2);
foreach ($chunked as $chunkIndex => $chunk) {
    echo "Chunk{$chunkIndex}=" . implode(",", $chunk) . PHP_EOL;
}
$stack = $values;
while (!empty($stack)) {
    $last = array_pop($stack);
    if ($last === $minimum) break;
}
$queue = new SplQueue();
foreach ($values as $value) $queue->enqueue($value);
echo "QueueHead=" . $queue->bottom() . PHP_EOL;
$heap = new SplMaxHeap();
foreach ($values as $value) $heap->insert($value);
echo "HeapMax=" . $heap->extract() . PHP_EOL;
<?php
echo "196ac7050ca4-52".PHP_EOL;
echo "196ac7050ca4-53".PHP_EOL;
echo "196ac7050ca4-54".PHP_EOL;
echo "196ac7050ca4-55".PHP_EOL;
echo "196ac7050ca4-56".PHP_EOL;
echo "196ac7050ca4-57".PHP_EOL;
echo "196ac7050ca4-58".PHP_EOL;
echo "196ac7050ca4-59".PHP_EOL;
echo "196ac7050ca4-60".PHP_EOL;
echo "196ac7050ca4-61".PHP_EOL;
echo "196ac7050ca4-62".PHP_EOL;
echo "196ac7050ca4-63".PHP_EOL;
echo "196ac7050ca4-64".PHP_EOL;
echo "196ac7050ca4-65".PHP_EOL;
echo "196ac7050ca4-66".PHP_EOL;
echo "196ac7050ca4-67".PHP_EOL;
echo "196ac7050ca4-68".PHP_EOL;
echo "196ac7050ca4-69".PHP_EOL;
echo "196ac7050ca4-70".PHP_EOL;
echo "196ac7050ca4-71".PHP_EOL;
echo "196ac7050ca4-72".PHP_EOL;
echo "196ac7050ca4-73".PHP_EOL;
echo "196ac7050ca4-74".PHP_EOL;
echo "196ac7050ca4-75".PHP_EOL;
echo "196ac7050ca4-76".PHP_EOL;
echo "196ac7050ca4-77".PHP_EOL;
echo "196ac7050ca4-78".PHP_EOL;
echo "196ac7050ca4-79".PHP_EOL;
?>