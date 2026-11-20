<?php
declare(strict_types=1);
$i_value=6;
$topic='transactions';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$pdo=new PDO('sqlite::memory:');$pdo->exec('CREATE TABLE balances(value INTEGER);INSERT INTO balances VALUES(10)');$pdo->beginTransaction();$pdo->exec('UPDATE balances SET value=20');$pdo->rollBack();echo 'TransactionRollback='.$pdo->query('SELECT value FROM balances')->fetchColumn().PHP_EOL;
