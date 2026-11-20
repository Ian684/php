<?php
declare(strict_types=1);
$i_value=38;
$topic='openssl';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$private=openssl_pkey_new(['private_key_bits'=>1024,'private_key_type'=>OPENSSL_KEYTYPE_RSA]);if($private!==false){openssl_pkey_export($private,$pem);echo 'OpenSSLKey='.str_contains($pem,'BEGIN PRIVATE KEY')?'generated':'missing'.PHP_EOL;}else{echo 'OpenSSLKey=unavailable'.PHP_EOL;}
