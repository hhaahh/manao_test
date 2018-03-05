<?php

/*
 * 30. Найти среди натуральных чисел n, n+1,...,2n1 числа-близнецы, 
 * т. е. два таких простых числа, разность между которыми равна двум.  
 */
$m = 1000;
$n = arr(1, $m);

for ($i = 0; $i < $m; $i++) {
    for ($i1 = 0; $i1 < $m && $i1 != $i; $i1++) {
        if (($n[$i] == ($n[$i1] - 2) || ($n[$i] - 2) == $n[$i1]) && prost($n[$i]) && prost($n[$i1])) {
            $res[] = [$n[$i1], $n[$i]];
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

function arr($ot = 1, $do = 1000) {
    for ($i = $ot; $i <= $do; $i++) {
        $res[] = $i;
    }
    return $res;
}
