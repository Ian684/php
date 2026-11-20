<?php
declare(strict_types=1);
$i_value=14;
$topic='mapping';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
echo 'Mapped='.implode(',',array_map(fn(int $n):int=>$n*$n,[12,7,19])).PHP_EOL;
