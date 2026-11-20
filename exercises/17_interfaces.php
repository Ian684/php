<?php
declare(strict_types=1);
$i_value=17;
$topic='interfaces';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
interface ExerciseInterface{public function run():string;}class ExerciseImplementation implements ExerciseInterface{public function run():string{return 'interfaces';}}echo 'Interface='.(new ExerciseImplementation())->run().PHP_EOL;
