<?php
declare(strict_types=1);
$i_value=8;
$topic='json';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$json=json_encode(['topic'=>'json','values'=>[12,7,19]],JSON_THROW_ON_ERROR);echo 'JSON='.$json.PHP_EOL;
