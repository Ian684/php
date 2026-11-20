<?php
declare(strict_types=1);
$i_value=25;
$topic='spl-queue';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$queue=new SplQueue();foreach([12,7,19]as$v)$queue->enqueue($v);echo 'Queue='.$queue->bottom().PHP_EOL;
