<?php
declare(strict_types=1);
$i_value=36;
$topic='random-bytes';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
echo 'RandomHex='.bin2hex(random_bytes(8)).PHP_EOL;
