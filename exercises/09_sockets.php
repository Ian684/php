<?php
declare(strict_types=1);
$i_value=9;
$topic='sockets';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$socket=@stream_socket_server('tcp://127.0.0.1:0',$errno,$errstr);if($socket){$address=stream_socket_get_name($socket,false);echo 'Socket='.($address!==false?$address:'created').PHP_EOL;fclose($socket);}else{echo 'Socket=unavailable'.PHP_EOL;}
