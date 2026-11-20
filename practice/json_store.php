<?php
declare(strict_types=1);

function updateNotes(string $path, callable $change): array
{
    $handle = fopen($path, 'c+');
    if ($handle === false) throw new RuntimeException('Cannot open notes file.');
    try {
        if (!flock($handle, LOCK_EX)) throw new RuntimeException('Cannot lock notes file.');
        $text = stream_get_contents($handle);
        if ($text === false) throw new RuntimeException('Cannot read notes file.');
        $notes = $text === '' ? [] : json_decode($text, true, 512, JSON_THROW_ON_ERROR);
        if (!is_array($notes) || !array_is_list($notes)) throw new RuntimeException('Expected a JSON list.');
        $updated = $change($notes);
        if (!is_array($updated) || !array_is_list($updated)) throw new RuntimeException('Callback must return a list.');
        $json = json_encode($updated, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . "\n";
        rewind($handle);
        if (!ftruncate($handle, 0) || fwrite($handle, $json) !== strlen($json) || !fflush($handle)) {
            throw new RuntimeException('Cannot write complete notes file.');
        }
        return $updated;
    } finally {
        flock($handle, LOCK_UN);
        fclose($handle);
    }
}
