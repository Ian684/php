<?php
declare(strict_types=1);
$i_value=26;
$topic='spl-heap';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$heap=new SplMaxHeap();$heap->insert(12);$heap->insert(19);echo 'Heap='.$heap->extract().PHP_EOL;
