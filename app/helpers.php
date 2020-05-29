<?php

    function asDollars($price) {
    if ($price < 0) return "-" .asDollars(-$price);
        return '$' . number_format($price / 100, 2);
        }

?>