<?php

//14. Парными простыми числами называются два простых числа, разность которых равна двум. 
//Например, 3 и 5; 11 и 13. Найти 10 парных простых чисел.
$i=2;
$count = 0;
while(true){
    $i2 = $i+2;
    if(prost($i) && prost($i2)){
        $res[] = [$i, $i2];
        if(++$count == 10){
            break;
        }
    }
    $i++;
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
