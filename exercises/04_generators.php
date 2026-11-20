<?php
declare(strict_types=1);
$i_value=4;
$topic='generators';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
function exercise_values():Generator{yield 12;yield 7;yield 19;} echo 'Generator='.implode(',',iterator_to_array(exercise_values())).PHP_EOL;
