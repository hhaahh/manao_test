<?php

/* 
 * 8. Получить все четырехзначные целые числа, в записи которых нет одинаковых цифр.
 */
require_once 'functions.php';
for($i=1000; $i<10000;$i++){
    $ost = $i%10;
    $numb = $i/10;
    if(!haveNumber($i)){
        $res[] = $i;
    }
}
print_r($res);