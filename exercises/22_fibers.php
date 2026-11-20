<?php
declare(strict_types=1);
$i_value=22;
$topic='fibers';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$fiber=new Fiber(function():void{Fiber::suspend('fiber-suspended');});echo 'Fiber='.$fiber->start().'|'.$fiber->resume().PHP_EOL;
