<?php

/*
 * 12. Определить, является ли заданное целое число N простым.
 */

$n = 201;
if (prost($n)) {
    echo 'Число является простым';
} else {
    echo 'Число не является простым';
}

function prost($n = 1) {
    $res = true;
    for ($i = 2; $i < ($n / 2); $i++) {
        if (($n % $i) == 0) {
            $res = false;
            break;
        }
    }
    return $res;
}


