<?php
declare(strict_types=1);
$i_value=30;
$topic='csv';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$stream=fopen('php://temp','r+');fputcsv($stream,['name','score']);fputcsv($stream,['Ada',98]);rewind($stream);echo 'CSVRows='.substr_count(stream_get_contents($stream),PHP_EOL).PHP_EOL;
