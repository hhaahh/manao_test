<?php
/* 
 * 26. Среди натуральных чисел n0 ,n1,...,nm найти число с максимальной суммой делителей.
 */

$m = 1000;
$n = arr(0,$m);
$maxSumm = 0;
$chislo = 0;
for($i=0; $i<$m; $i++){
    $summDel=summDel($n[$i]);
    if($summDel > $maxSumm){
        $maxSumm=$summDel;
        $chislo = $n[$i];
    }
}
echo "Число - $chislo, максимальная сумма делителей - $maxSumm";


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

function arr($ot = 1, $do=1000){
    for($i = $ot; $i<=$do; $i++){
        $res[] = $i;
    }    
    return $res;
}