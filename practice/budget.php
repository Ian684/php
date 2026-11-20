<?php
declare(strict_types=1);

function parseCents(string $amount): int
{
    if (!preg_match('/\A(0|[1-9][0-9]{0,8})(?:\.([0-9]{1,2}))?\z/', $amount, $matches)) {
        throw new InvalidArgumentException('Use a non-negative decimal with at most two decimal places.');
    }
    $fraction = str_pad($matches[2] ?? '', 2, '0');
    return (int) $matches[1] * 100 + (int) $fraction;
}

function categoryTotals(array $expenses): array
{
    $totals = [];
    foreach ($expenses as $expense) {
        if (!isset($expense['category'], $expense['amount']) || !is_string($expense['category']) || trim($expense['category']) === '' || !is_string($expense['amount'])) {
            throw new InvalidArgumentException('Each expense needs category and amount strings.');
        }
        $category = trim($expense['category']);
        $cents = parseCents($expense['amount']);
        if (($totals[$category] ?? 0) > PHP_INT_MAX - $cents) {
            throw new OverflowException('Category total exceeds integer range.');
        }
        $totals[$category] = ($totals[$category] ?? 0) + $cents;
    }
    ksort($totals);
    return $totals;
}
