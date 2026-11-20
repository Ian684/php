<?php
declare(strict_types=1);
$i_value=15;
$topic='exception';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
try{throw new RuntimeException('exercise error');}catch(RuntimeException $e){echo 'Exception='.$e->getMessage().PHP_EOL;}
