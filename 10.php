<?php

/* 
 * 10. Найти все меньшие N числа-палиндромы, которые при возведении в квадрат дают палиндром. 
 * Число называется палиндромом, если его запись читается одинаково с начала и с конца.
 */
require_once 'functions.php';
$countSearch = 100000;
for($i=1; $i<$countSearch; $i++){
    $pal = palindrom($i);
    if($pal && palindrom(pow($i, 2))){
        $res[] = $i;
    }
}
print_r($res);