<?php
declare(strict_types=1);
$i_value=20;
$topic='enums';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
enum ExerciseStatus:string{case READY='ready';case DONE='done';}echo 'Enum='.ExerciseStatus::DONE->value.PHP_EOL;
