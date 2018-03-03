<?php

/* 6. Получить все четырехзначные числа, в записи которых встречаются только цифры 0,2,3,7.
 */

for ($i = 1000; $i < 10000; $i++) {
    if(haveNumbers($i))
        $res[] = $i;
}
function haveNumbers($numb){
    while ($numb > 0) {
        $cifra = $numb % 10;
        if ($cifra == 0 || $cifra == 2 || $cifra == 3 || $cifra == 7) {
            $numb /= 10;
            $numb = (int) $numb;
        } else {
            return false;
        }
    }
    return true;
}
print_r($res);