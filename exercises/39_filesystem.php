<?php
declare(strict_types=1);
$i_value=39;
$topic='filesystem';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$name='php-exercise-39.tmp';file_put_contents($name,'filesystem exercise');echo 'Filesystem='.((file_exists($name)&&filesize($name)>0)?'written':'missing').PHP_EOL;unlink($name);
