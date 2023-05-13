<?php

function stringToCurrency(string $currency): float
{
    $convertedCurrency = preg_replace(
        '/^R\$\s*|\s+|\./',
        '',
        $currency
    );

    return floatval($convertedCurrency / 100);
}
