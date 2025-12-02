<?php

declare(strict_types=1);

$input = explode(PHP_EOL, trim(file_get_contents(__DIR__ . '/input.txt')));

$position = 50;
$zeroes = 0;

$turnRight = function (int $position, int $steps) use (&$zeroes): int {
    foreach (range(1, $steps) as $step) {
        $position++;
        if ($position === 100) {
            $position = 0;
            $zeroes++;
        }
    }
    return $position;
};

$turnLeft = function (int $position, int $steps) use (&$zeroes): int {
    foreach (range(1, $steps) as $step) {
        $position--;
        if ($position === 0) {
            $zeroes++;
        }
        if ($position === -1) {
            $position = 99;
        }
    }
    return $position;
};

foreach ($input as $move) {
    $dir = substr($move, 0, 1);
    $steps = (int)substr($move, 1);
    if ($dir === 'L') {
        $position = $turnLeft($position, $steps);
    } else {
        $position = $turnRight($position, $steps);
    }
}

echo sprintf('Password: %d', $zeroes) . PHP_EOL;
