<?php
declare(strict_types=1);
$i_value=37;
$topic='hmac';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$key='exercise-key';$message='verified message';$signature=hash_hmac('sha256',$message,$key);echo 'HMAC='.substr($signature,0,16).'...'.PHP_EOL;echo 'HMACValid='.(hash_equals($signature,hash_hmac('sha256',$message,$key))?'yes':'no').PHP_EOL;
