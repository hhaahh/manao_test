<?php

/* 
 * 22. Натуральное число N разложить на простые множители.
 */

$n = 5555;
for($i = 2, $n2 = $n; $i<$n; $i++){
    if(prost($i) && $n2%$i == 0){
        $res[] = $i;
        $n2 /= $i;
        $i = 2;
        if($n==1){
            break;
        }
    }
}
print_r($res);

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