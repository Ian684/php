<?php
declare(strict_types=1);
$i_value=32;
$topic='pdo-transactions';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$pdo=new PDO('sqlite::memory:');$pdo->beginTransaction();$pdo->exec('CREATE TABLE account(balance INTEGER);INSERT INTO account VALUES(100)');$pdo->exec('UPDATE account SET balance=balance-25');$pdo->commit();echo 'PDOTransaction='.$pdo->query('SELECT balance FROM account')->fetchColumn().PHP_EOL;
