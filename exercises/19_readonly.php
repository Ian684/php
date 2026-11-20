<?php
declare(strict_types=1);
$i_value=19;
$topic='readonly';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
final readonly class ExerciseReadOnly{public function __construct(public string $value='readonly'){}}echo 'Readonly='.(new ExerciseReadOnly())->value.PHP_EOL;
