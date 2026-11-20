<?php
declare(strict_types=1);

function createLedger(PDO $db): void
{
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('CREATE TABLE accounts(name TEXT PRIMARY KEY, cents INTEGER NOT NULL CHECK(cents>=0))');
}

function transfer(PDO $db, string $from, string $to, int $cents): void
{
    if ($cents <= 0 || $from === $to) throw new InvalidArgumentException('Positive transfer between distinct accounts required.');
    $db->beginTransaction();
    try {
        $debit = $db->prepare('UPDATE accounts SET cents=cents-:amount WHERE name=:name AND cents>=:amount');
        $debit->bindValue(':amount', $cents, PDO::PARAM_INT);
        $debit->bindValue(':name', $from);
        $debit->execute();
        if ($debit->rowCount() !== 1) throw new RuntimeException('Missing sender or insufficient balance.');
        $credit = $db->prepare('UPDATE accounts SET cents=cents+:amount WHERE name=:name AND cents<=:limit');
        $credit->bindValue(':amount', $cents, PDO::PARAM_INT);
        $credit->bindValue(':name', $to);
        $credit->bindValue(':limit', PHP_INT_MAX - $cents, PDO::PARAM_INT);
        $credit->execute();
        if ($credit->rowCount() !== 1) throw new RuntimeException('Missing recipient or balance overflow.');
        $db->commit();
    } catch (Throwable $error) {
        if ($db->inTransaction()) $db->rollBack();
        throw $error;
    }
}
