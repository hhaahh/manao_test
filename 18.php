<?php

/*
 * 18. Два натуральных числа называют дружественными, если каждое из них равно сумме всех делителей другого. 
 * Найти все пары дружественных чисел, лежащих в диапазоне от N до M.
 */

$n = 5;
$m = 3000;

for ($i = $n; $i <= $m; $i++) {
    $summDelI = summDel($i);
    for($i2 = $i+1; $i2 < $m; $i2++){
        if($summDelI == $i2){
            if(summDel($i2) == $i){
                $res[] = [$i, $i2];
            }
        }
    }
}
print_r($res);

function summDel($value) {
    $i = 1;
    $summ = 0;
    for ($i = 1; $i < $value; $i++) {
        if ($value % $i == 0) {
            $summ += $i;
        }
    }
    return $summ;
}
