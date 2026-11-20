<?php
declare(strict_types=1);
$i_value=18;
$topic='traits';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
trait ExerciseTrait{public function run():string{return 'traits';}}class ExerciseUsesTrait{use ExerciseTrait;}echo 'Trait='.(new ExerciseUsesTrait())->run().PHP_EOL;
