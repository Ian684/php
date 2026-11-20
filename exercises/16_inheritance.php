<?php
declare(strict_types=1);
$i_value=16;
$topic='inheritance';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
class ExerciseBase{public function label():string{return 'inheritance';}}class ExerciseChild extends ExerciseBase{}echo 'Inheritance='.(new ExerciseChild())->label().PHP_EOL;
