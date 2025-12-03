<?php

declare(strict_types=1);

$input = explode(',', trim(file_get_contents(__DIR__ . '/input.txt')));
$input = array_map(function (string $range): array {
    sscanf($range, "%d-%d", $a, $b);
    return [$a, $b];
}, $input);

function divisorsOf(int $number): array
{
    return array_filter(range(1, $number), fn(int $divisor) => $number % $divisor === 0);
}

function isInvalid(int $number): bool
{
    $strNumber = strval($number);
    $lengths = divisorsOf(strlen($strNumber));
    foreach ($lengths as $length) {
        $parts = str_split($strNumber, $length);
        if (count($parts) > 1 && count(array_unique($parts)) === 1) {
            return true;
        }
    }
    return false;
}

$sum = 0;
foreach ($input as $range) {
    foreach (range($range[0], $range[1]) as $number) {
        if (isInvalid($number)) {
            $sum += $number;
        }
    }
}

echo $sum;
