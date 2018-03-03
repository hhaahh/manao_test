<?php

/* 
 * 11. Напечатать те элементы последовательности натуральных чисел n0 ,n1,...,nm , которые делятся на сумму своих цифр.
 */
$m = 1000;
$n = randArray($m, 10000);
for($i=0; $i<$m; $i++){
    if( $n[$i]%summC($n[$i]) == 0){
        $res[] = $n[$i];
    }
}
print_r($res);

function randArray($count = 10, $max=1000){
    $count = (int)$count;
    while($count--){
        $res[] = rand(1, $max);
    }    
    return $res;
}

function summC($n = 1000) {
    $i = 1;
    $res = 0;
    while ($n > 0) {
        $res += $n % 10;
        (int) $n /= 10;
    }
    return $res;
}