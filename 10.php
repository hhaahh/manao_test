<?php

/* 
 * 10. Найти все меньшие N числа-палиндромы, которые при возведении в квадрат дают палиндром. 
 * Число называется палиндромом, если его запись читается одинаково с начала и с конца.
 */
$countSearch = 100000;
for($i=1; $i<$countSearch; $i++){
    $pal = palindrom($i);
    if($pal && palindrom(pow($i, 2))){
        $res[] = $i;
    }
}
print_r($res);

function palindrom($n){
    $cifry = cifry($n);
    $first = 0;
    $last = $cifry['count']-1;
    for($i=$first; $i<$last; $i++, $last--){
        if($cifry['list'][$i]!=$cifry['list'][$last]){
            return false;
        }
    }
    return true;
}

function cifry($n){
    $numb = $n;
    $count = 0;
    while ($numb > 0) {
        $res[] = $numb % 10;
        $count++;
        $numb /= 10;
        $numb = (int)$numb;
    }
    return ['list'=>$res, 'count'=>$count];
}

