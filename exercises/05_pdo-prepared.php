<?php
declare(strict_types=1);
$i_value=5;
$topic='pdo-prepared';
echo "Exercise {$i_value}: {$topic}".PHP_EOL;
$pdo=new PDO('sqlite::memory:');$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);$pdo->exec('CREATE TABLE users(id INTEGER,name TEXT)');$stmt=$pdo->prepare('INSERT INTO users(id,name) VALUES(:id,:name)');$stmt->execute([':id'=>27,':name'=>'Ada']);echo 'PDOPrepared='.$pdo->query('SELECT count(*) FROM users')->fetchColumn().PHP_EOL;
