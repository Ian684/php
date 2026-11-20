<?php
declare(strict_types=1);
$i_value=21;
$topic='attributes';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
#[Attribute]class ExerciseAttribute{}#[ExerciseAttribute]class ExerciseAttributed{}echo 'Attributes='.count((new ReflectionClass(ExerciseAttributed::class))->getAttributes()).PHP_EOL;
