<?php

//2. Получить  все  четырехзначные  числа,  сумма  цифр  которых  равна заданному числу  n.
$n = 2;
for ($i = 1000; $i < 10000; $i++) {
    if (summC($i) == $n) {
        $res[]=$i;
    }
}
print_r($res);



function summC($n = 1000) {
    $i = 1;
    $res = 0;
    while ($n > 0) {
        $res += $n % 10;
        (int) $n /= 10;
    }
    return $res;
}
