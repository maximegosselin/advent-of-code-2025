<?php

declare(strict_types=1);

$input = explode(PHP_EOL, trim(file_get_contents(__DIR__ . '/input.txt')));

$cursor = 50;
$zeroes = 0;

foreach ($input as $move) {
    $dir = str_starts_with($move, 'L') ? -1 : 1;
    $steps = $dir * (int)substr($move, 1);
    $cursor = ($cursor + $steps) % 100;
    if ($cursor === 0) {
        $zeroes++;
    }
}

echo sprintf('Password: %d', $zeroes) . PHP_EOL;
