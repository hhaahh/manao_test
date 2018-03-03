<?php

//4. Найти все четные четырехзначные числа, цифры которых следуют в порядке возрастания или убывания
for($i=1000;$i<10000;$i++){
    if($i%2==0 && (vozrast($i) || ubyv($i))){
        $res[]=$i;
    }
}
print_r($res);
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