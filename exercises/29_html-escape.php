<?php
declare(strict_types=1);
$i_value=29;
$topic='html-escape';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$unsafe='<script>alert(\"x\")</script>';echo 'Escaped='.htmlspecialchars($unsafe,ENT_QUOTES,'UTF-8').PHP_EOL;
