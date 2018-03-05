<?php

/*
 * 28. Преобразовать числа заданной последовательности натуральных чисел n0 ,n1,...,nm так, 
 * чтобы цифры каждого числа образовывали максимально возможные числа.
 */

$m = 1000;
$n = arr(0, $m);//последовательный массив

for ($key = 0; $key < $m; $key++) {
    $cifraArr = cifry($n[$key]); //получаем массив символов
    for ($i = 1; $i < $cifraArr['count']; $i++) {//сортируем масссив
        if ($cifraArr['list'][$i] < $cifraArr['list'][$i - 1]) {
            $c = $cifraArr['list'][$i];
            $cifraArr['list'][$i] = $cifraArr['list'][$i - 1];
            $cifraArr['list'][$i - 1] = $c;
            $i = 0;
        }
    }
    $res = 0;
    for ($i = 0; $i < $cifraArr['count']; ++$i) {//преобразуем массив в число
        $res += $cifraArr['list'][$i] * myPow(10, $i);
    }
    $resArr[] = $res;
}

print_r($resArr);

function cifry($n) {
    $numb = $n;
    $count = 0;
    while ($numb > 0) {
        $res[] = $numb % 10;
        $count++;
        $numb /= 10;
        $numb = (int) $numb;
    }
    return ['list' => $res, 'count' => $count];
}

function myPow($numb, $stepen) {
    $res = 1;
    while ($stepen--) {
        $res *= $numb;
    }
    return $res;
}

function arr($ot = 1, $do = 1000) {
    for ($i = $ot; $i <= $do; $i++) {
        $res[] = $i;
    }
    return $res;
}
