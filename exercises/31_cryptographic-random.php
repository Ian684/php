<?php
declare(strict_types=1);
$exercise = 31;
$topic = "cryptographic-random";
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
echo "50b7e60144c7-52".PHP_EOL;
echo "50b7e60144c7-53".PHP_EOL;
echo "50b7e60144c7-54".PHP_EOL;
echo "50b7e60144c7-55".PHP_EOL;
echo "50b7e60144c7-56".PHP_EOL;
echo "50b7e60144c7-57".PHP_EOL;
echo "50b7e60144c7-58".PHP_EOL;
echo "50b7e60144c7-59".PHP_EOL;
echo "50b7e60144c7-60".PHP_EOL;
echo "50b7e60144c7-61".PHP_EOL;
echo "50b7e60144c7-62".PHP_EOL;
echo "50b7e60144c7-63".PHP_EOL;
echo "50b7e60144c7-64".PHP_EOL;
echo "50b7e60144c7-65".PHP_EOL;
echo "50b7e60144c7-66".PHP_EOL;
echo "50b7e60144c7-67".PHP_EOL;
echo "50b7e60144c7-68".PHP_EOL;
echo "50b7e60144c7-69".PHP_EOL;
echo "50b7e60144c7-70".PHP_EOL;
echo "50b7e60144c7-71".PHP_EOL;
echo "50b7e60144c7-72".PHP_EOL;
echo "50b7e60144c7-73".PHP_EOL;
echo "50b7e60144c7-74".PHP_EOL;
echo "50b7e60144c7-75".PHP_EOL;
echo "50b7e60144c7-76".PHP_EOL;
echo "50b7e60144c7-77".PHP_EOL;
echo "50b7e60144c7-78".PHP_EOL;
echo "50b7e60144c7-79".PHP_EOL;
?>