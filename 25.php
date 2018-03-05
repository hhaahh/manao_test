<?php

/* 
 * Среди заданной последовательности натуральных чисел n0 ,n1,...,nm 
 * найти сумму и количество тех чисел, 
 * которые равны сумме факториалов своих цифр.
 */
// 1*2*3*4
$m = 1000;
$n = arr($ot = 1, $do = $m); // заданная последовательность чисел в массиве от $ot до $do
$count = 0;
$summ = 0;
for($i=0; $i<$m; $i++){
    if( summFacCifr($n[$i]) == $n[$i]){
        $count++;
        $summ+=$n[$i];
    }
}
echo "Сумма - $summ, количество - $count.";


function summFacCifr($value){ //сумма факториалов цифр числа
    $res = 0;
    while ($value > 0) {
        $res += fac($value % 10);
        $value /= 10;
        $value = (int)$value;
    }
    return $res;
}
function fac($value){ //факториал заданного числа
    if($value==0){
        return 1;
    }else{
        return $value*fac($value-1);
    }
}

function arr($ot = 1, $do=1000){
    for($i = $ot; $i<=$do; $i++){
        $res[] = $i;
    }    
    return $res;
}