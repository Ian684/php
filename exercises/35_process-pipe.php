<?php
declare(strict_types=1);
$i_value=35;
$topic='process-pipe';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
echo 'PipeRead='.trim(shell_exec('printf pipe-data')).PHP_EOL;
