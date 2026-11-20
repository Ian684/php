<?php
declare(strict_types=1);
$i_value=13;
$topic='filtering';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
echo 'Filtered='.implode(',',array_filter([12,7,19,3,25],fn(int $n):bool=>$n%2===0)).PHP_EOL;
