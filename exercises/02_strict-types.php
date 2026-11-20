<?php
declare(strict_types=1);
$i_value=2;
$topic='strict-types';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$add=function(int $a,int $b):int{return $a+$b;};echo 'StrictResult='.$add(12,7).PHP_EOL;
