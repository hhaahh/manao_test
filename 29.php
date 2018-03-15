<?php

/*
 * 29. Для  каждого  числа  заданной  последовательности  натуральных   чисел   n0 ,n1,...,nm установить,  
 * можно  ли  вычеркнуть  в  нем  некоторые  цифры, чтобы сумма оставшихся равнялась заданному числу к.
 */

$n = 123154;
$k = 15;

$cifry = cifry($n);
$c2 = deleteElementCifry($cifry, 3);
print_r($c2);

for ($i = 0; $i < $cifry['count']; $i++) {
    $summaC = summC($cifry['value']);
    if ($summaC == $k) {
        return;
    }
}

function summaNekotoryhCifr($value, $summa='k') {
    $cifry = cifry($value);
    $summaC = summC($cifry['value']);
    for ($i = 0; $i < $cifry['count']; $i++) {
        if ($summaC == $summa) {
            return true;
        } else {
            summaNekotoryhCifr($value, $summa);
        }
    }
    return false;
}


/*
доделать
 *  */
function deleteElementCifry($cifry, $key) {
    $res = [];
    if ($key >= $cifry['count']) {
        return NULL;
    }
    $res['value'] = 0;
    $res['count'] = $cifry['count'] - 1;
    for ($i = 0; $i <= $res['count']; $i++) {
        if ($key != $i){
            $res['list'][] = $cifry['list'][$i];
            $res['value'] += $cifry['list'][$i] * myPow(10, $i);
        }else{
            $i--;
            $key=-1;
        }
    }
    return $res;
}
function cifry($n) {
    $numb = $n;
    $count = 0;
    while ($numb > 0) {
        $res[] = $numb % 10;
        $count++;
        $numb /= 10;
        $numb = (int) $numb;
    }
    return ['list' => $res, 'count' => $count, 'value' => $n];
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
function myPow($numb, $stepen) {
    $res = 1;
    while ($stepen--) {
        $res *= $numb;
    }
    return $res;
}