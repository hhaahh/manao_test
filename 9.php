<?php

/* 
 * 9. Дано натуральное число N. Определить, является ли оно автоморфным. 
 * Автоморфное число равно последним разрядам квадрата этого числа. Например, 5 и 25, 6 и 36, 25 и 625.
 */
$n = 25;
$n2 = $n*$n;
$numb = $n;
$i=1;
while(true){
    $numb /= 10;
    if((int)$numb > 0){
        $i++;
    }else{
        break;
    }
}
if($n2%myPow(10,$i) == $n){
    echo "Число N является автоморфным";
}else{
    echo "Число N не является автоморфным";
}
function myPow($numb, $stepen){
   $res=$numb;
   while(--$stepen){
       $res *= $numb;
   }
   return $res;
}

