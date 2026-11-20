<?php
declare(strict_types=1);
namespace Exercise;
$i_value=10;
$topic='namespaces';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
class NamedExercise {}
echo 'Namespace='.get_class(new NamedExercise()).PHP_EOL;
