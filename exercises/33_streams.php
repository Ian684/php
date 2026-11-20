<?php
declare(strict_types=1);
$i_value=33;
$topic='streams';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$stream=fopen('php://temp','r+');fwrite($stream,'stream exercise');rewind($stream);echo 'Stream='.stream_get_contents($stream).PHP_EOL;
