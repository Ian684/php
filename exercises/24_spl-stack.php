<?php
declare(strict_types=1);
$i_value=24;
$topic='spl-stack';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$stack=new SplStack();foreach([12,7,19]as$v)$stack->push($v);echo 'Stack='.$stack->pop().PHP_EOL;
