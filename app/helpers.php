<?php

    function asDollars($price) {
    if ($price < 0) return "-" .asDollars(-$price);
        return '$' . number_format($price / 100, 2);
        }

    function stringsToInteger($value)
    {
        $region = 'en_US';
        $fmt = new NumberFormatter($region, NumberFormatter::DECIMAL);
        return $fmt->parse($value);
    }

?>