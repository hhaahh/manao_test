<?php

/* 
 * 15. Определить количество различных делителей целого числа N.
 */

$n = 78;
$count = 0;
for($i = 1; $i<=$n; $i++){
    if(($n%$i) == 0){
        $count++;
    }
}
echo "Количество делителей числа \"$n\" = $count";