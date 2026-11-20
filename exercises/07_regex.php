<?php
declare(strict_types=1);
$i_value=7;
$topic='regex';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
preg_match('/^([A-Za-z]+)-([0-9]{2})$/','PHP-27',$matches);echo 'RegexMatch='.implode(':',$matches).PHP_EOL;
