<?php

declare(strict_types=1);

$lines = explode(PHP_EOL, trim(file_get_contents(__DIR__ . '/input.txt')));

$totalJoltage = 0;

foreach ($lines as $line) {
    $numbers = array_map('intval', str_split($line));
    $maxNumber = max($numbers);
    $joltage = $maxNumber;

    $indexOfFirstMaxNumber = array_search($maxNumber, $numbers);
    $numbersBefore = array_map('intval', str_split(substr($line, 0, $indexOfFirstMaxNumber)));
    $numbersAfter = array_map('intval', str_split(substr($line, $indexOfFirstMaxNumber - 1)));

    if (count($numbersAfter)) {
        $joltage .= max($numbersAfter);
    } else {
        $joltage = $joltage . max($numbersBefore);
    }
    $totalJoltage += intval($joltage);
}

echo $totalJoltage;