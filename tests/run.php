<?php
declare(strict_types=1);
foreach (glob(__DIR__ . '/../practice/*.php') as $file) require $file;

function check(bool $ok, string $message): void {
    if (!$ok) throw new RuntimeException($message);
}
function fails(callable $call, string $type): void {
    try { $call(); } catch (Throwable $error) {
        check($error instanceof $type, 'Wrong exception: ' . $error::class); return;
    }
    throw new RuntimeException('Expected exception ' . $type);
}

check(parseCents('0.10') + parseCents('0.20') === 30, 'Exact decimal addition');
check(categoryTotals([['category'=>' food ','amount'=>'1.5']]) === ['food'=>150], 'Category totals');
foreach (['-1','NaN','1.001','01','1e3',''] as $value) fails(fn()=>parseCents($value), InvalidArgumentException::class);
check(validateRegistration(['name'=>'Ian','email'=>'ian@example.test','password'=>'a-long-passphrase']) === [], 'Valid form');
check(count(validateRegistration(['name'=>[], 'email'=>[], 'password'=>[]])) === 3, 'Array form input');
check(escapeHtml('<a href="x">') === '&lt;a href=&quot;x&quot;&gt;', 'HTML escaping');
$hash = password_hash('a-long-passphrase', PASSWORD_DEFAULT);
check(password_verify('a-long-passphrase', $hash), 'Password hash');
check(!password_verify('wrong', $hash), 'Wrong password');
$db = new PDO('sqlite::memory:');
createLedger($db);
$db->exec("INSERT INTO accounts VALUES('alice',1000),('bob',100)");
transfer($db, 'alice', 'bob', 300);
check($db->query('SELECT sum(cents) FROM accounts')->fetchColumn() == 1100, 'Money conserved');
check($db->query("SELECT cents FROM accounts WHERE name='alice'")->fetchColumn() == 700, 'Debit');
fails(fn()=>transfer($db,'alice','missing',100), RuntimeException::class);
fails(fn()=>transfer($db,'alice','bob',9999), RuntimeException::class);
check($db->query("SELECT cents FROM accounts WHERE name='alice'")->fetchColumn() == 700, 'Rollback');
fails(fn()=>transfer($db,'alice','alice',100), InvalidArgumentException::class);
$db->exec("INSERT INTO accounts VALUES('full',9223372036854775807)");
fails(fn()=>transfer($db,'alice','full',1), RuntimeException::class);
check($db->query("SELECT cents FROM accounts WHERE name='alice'")->fetchColumn() == 700, 'Overflow rollback');
$path = tempnam(sys_get_temp_dir(), 'php-practice-');
try {
    check(updateNotes($path, fn($notes)=>[...$notes,'第一筆']) === ['第一筆'], 'First note');
    check(updateNotes($path, fn($notes)=>[...$notes,'second']) === ['第一筆','second'], 'Preserved notes');
    $before = file_get_contents($path);
    fails(fn()=>updateNotes($path, fn($notes)=>['bad'=>1]), RuntimeException::class);
    check(file_get_contents($path) === $before, 'Invalid update preserves old file');
    file_put_contents($path, '{bad json');
    fails(fn()=>updateNotes($path, fn($notes)=>[]), JsonException::class);
} finally { unlink($path); }
echo "4 PHP exercises: validation, money, transactions and JSON checks passed\n";
require __DIR__.'/more.php';
