<?php
declare(strict_types=1);
$i_value=31;
$topic='json-column';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$payload=['kind'=>'inventory','items'=>3];$column=json_encode($payload,JSON_THROW_ON_ERROR);echo 'JSONColumn='.$column.PHP_EOL;
