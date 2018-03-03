<?php

/* 
 * 8. Получить все четырехзначные целые числа, в записи которых нет одинаковых цифр.
 */
for($i=1000; $i<10000;$i++){
    if(!haveNumber($i)){
        $res[] = $i;
    }
}
print_r($res);
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