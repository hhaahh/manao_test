<?php

/* 
 * 20. Найти целое число в диапазоне от N до M с наибольшей суммой делителей.
 */

$n = 1;
$m = 100;
$res = ['число'=>0, 'сумма делителей'=>0];
for($i = $n; $i<=$m; $i++){
    $summDel = summDel($i);
    if($summDel > $res['сумма делителей']){
        $res = ['число'=>$i, 'сумма делителей'=>$summDel];
    }
}
print($res['число']);

function summDel($value) {
    $i = 1;
    $summ = 0;
    for ($i = 1; $i <= $value; $i++) {
        if ($value % $i == 0) {
            $summ += $i;
        }
    }
    return $summ;
}