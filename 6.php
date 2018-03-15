<?php

/* 6. Получить все четырехзначные числа, в записи которых встречаются только цифры 0,2,3,7.
 */


for ($i = 1000; $i < 10000; $i++) {
    if (haveNumbers($i))
        $res[] = $i;
}

function haveNumbers($numb) {
    $nol = 0;
    $dva = 2;
    $tri = 3;
    $sem = 7;
    while ($numb > 0) {
        $cifra = $numb % 10;
        if ($cifra == $nol) {
            $nol = -1;
        } elseif ($cifra == $dva) {
            $dva = -1;
        } elseif ($cifra == $tri) {
            $tri = -1;
        } elseif ($cifra == $sem) {
            $sem = -1;
        } else {
            return false;
        }
        $numb /= 10;
        $numb = (int) $numb;
    }
    return true;
}

print_r($res);
