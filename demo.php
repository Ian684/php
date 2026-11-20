<?php
declare(strict_types=1);
require __DIR__ . '/practice/budget.php';
require __DIR__ . '/practice/validation.php';
require __DIR__ . '/practice/ledger.php';

echo json_encode(categoryTotals([
    ['category' => 'food', 'amount' => '0.10'],
    ['category' => 'food', 'amount' => '0.20'],
]), JSON_PRETTY_PRINT), "\n";
$db = new PDO('sqlite::memory:');
createLedger($db);
$db->exec("INSERT INTO accounts VALUES('alice',10000),('bob',0)");
transfer($db, 'alice', 'bob', 2500);
echo json_encode($db->query('SELECT * FROM accounts ORDER BY name')->fetchAll(PDO::FETCH_ASSOC)), "\n";
echo escapeHtml('<script>alert("demo")</script>'), "\n";
