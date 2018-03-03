<?php
//находит числа в записи которых присутствуют одинаковые цифры
//$n
function haveNumber($n, $i=NULL) {
    $numb = $n;
    while ($numb > 0) {
        $cifra = $numb % 10;
        if($cifra === $i){
            return true;
        }
        $numb /= 10;
        $numb = (int)$numb;
    }
    if($n<11){
        return false;
    }
    $ost = $n%10;
    $n = $n/10;
    $n = (int)$n;
    if(haveNumber($n, $ost)==true){
        return true;
    }else{
        return false;
    }
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


function summC($n = 1000) {
    $i = 1;
    $res = 0;
    while ($n > 0) {
        $res += $n % 10;
        (int) $n /= 10;
    }
    return $res;
}

function vozrast($n = 1234) { //определяет следуют ли цифры по возрастанию
    $cifra = 10;
    while ($n > 0) {
        if (($n % 10) < $cifra) {
            $cifra = $n % 10;
            $n /= 10;
            $n = (int) $n;
        } else {
            return false;
        }
    }
    return true;
}

function ubyv($n) { //определяет следуют ли цифры по убыванию
    $cifra = -1;
    while ($n > 0) {
        if (($n % 10) > $cifra) {
            $cifra = $n % 10;
            $n /= 10;
            $n = (int) $n;
        } else {
            return false;
        }
    }
    return true;
}

function randArray($count = 10, $max=1000){
    $count = (int)$count;
    while($count--){
        $res[] = rand(1, $max);
    }    
    return $res;
}