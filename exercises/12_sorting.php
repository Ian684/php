<?php
declare(strict_types=1);
$i_value=12;
$topic='sorting';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$sorted=[12,7,19,3,25];sort($sorted);echo 'Sorted='.implode(',',$sorted).PHP_EOL;
