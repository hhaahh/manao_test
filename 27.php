<?php

/*
 * 27. Среди натуральных чисел  n0 ,n1,...,nm найти число с максимальной  суммой простых делителей.  
 */


$m = 99999;
$n = arr(10000, $m);
$maxSumm = 0;
$chislo = 0;
for ($i = 0; $i < $m; $i++) {
    $summDel = summProstDel($n[$i]);
    if ($summDel > $maxSumm) {
        $maxSumm = $summDel;
        $chislo = $n[$i];
    }
}
echo "Число - $chislo, максимальная сумма простых делителей - $maxSumm";

function summProstDel($value) {
    $i = 1;
    $summ = 0;
    for ($i = 1; $i <= $value; $i++) {
        if ($value % $i == 0 && prost($i)) {
            $summ += $i;
        }
    }
    return $summ;
}

function arr($ot = 1, $do = 1000) {
    for ($i = $ot; $i <= $do; $i++) {
        $res[] = $i;
    }
    return $res;
}

function prost($n = 1) {
    $res = true;
    for ($i = 2; $i < $n; $i++) {
        if (($n % $i) == 0) {
            $res = false;
            break;
        }
    }
    return $res;
}
