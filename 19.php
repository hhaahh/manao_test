<?php

/*
 * 19. Найти наименьшее общее кратное (НОК) двух натуральных чисел N и M.
 */
$n = 15;
$m = 9;

echo $nok = ($n*$m) / nod($n, $m);

function nod($n, $m) {
    if ($n < $m) {
        $n1 = $m;
        $m = $n;
        $n = $n1;
    }
    $res = $m;
    $ost = $n % $m;
    while ($ost != 0) {
        $n = $m;
        $m = $ost;
        $res = $ost;
        $ost = $n % $m;
    }
    return $res;
}
