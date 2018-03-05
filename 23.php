<?php

/*
 * 23. Дано целое число N. Преобразовать число так, чтобы его цифры следовали в порядке возрастания.
 */
$n = 6141981;
$cifraArr = cifry($n);//получаем массив символов
for ($i = 1; $i < $cifraArr['count']; $i++) {//сортируем масссив
    if ($cifraArr['list'][$i] > $cifraArr['list'][$i - 1]) {
        $c = $cifraArr['list'][$i];
        $cifraArr['list'][$i] = $cifraArr['list'][$i - 1];
        $cifraArr['list'][$i - 1] = $c;
        $i = 0;
    }
}
$res = 0;
for ($i = 0; $i < $cifraArr['count']; ++$i) {//преобразуем массив в строку
    $res += $cifraArr['list'][$i] * myPow(10, $i);
}

echo $res;

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
