<?php

//2. Получить  все  четырехзначные  числа,  сумма  цифр  которых  равна заданному числу  n.
require_once 'functions.php';
$n = 2;
for ($i = 1000; $i < 10000; $i++) {
    if (summC($i) == $n) {
        $res[]=$i;
    }
}
print_r($res);

