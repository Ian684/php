<?php
declare(strict_types=1);
$i_value=27;
$topic='password-hash';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$password='correct horse battery staple';
$hash=password_hash($password,PASSWORD_DEFAULT);
echo 'PasswordHash='.(password_verify($password,$hash)?'valid':'invalid').PHP_EOL;
