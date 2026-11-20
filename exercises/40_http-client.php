<?php
declare(strict_types=1);
$i_value=40;
$topic='http-client';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$url='data://text/plain,HTTP%20client%20exercise';$body=file_get_contents($url,false,null,0,100);echo 'HTTPBody='.($body?:'empty').PHP_EOL;
