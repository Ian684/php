<?php
declare(strict_types=1);
$i_value=28;
$topic='csrf-token';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$token=bin2hex(random_bytes(16));echo 'CSRFTokenLength='.strlen($token).PHP_EOL;
