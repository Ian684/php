<?php
declare(strict_types=1);
$i_value=23;
$topic='weak-map';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$object=(object)['name'=>'weak-map'];$map=new WeakMap();$map[$object]='exercise';echo 'WeakMap='.$map[$object].PHP_EOL;
