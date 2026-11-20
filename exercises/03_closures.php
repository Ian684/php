<?php
declare(strict_types=1);
$i_value=3;
$topic='closures';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$multiply=fn(int $a,int $b):int=>$a*$b;echo 'ClosureResult='.$multiply(12,7).PHP_EOL;
