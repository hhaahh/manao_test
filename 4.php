<?php

//4. Найти все четные четырехзначные числа, цифры которых следуют в порядке возрастания или убывания
for ($i = 1000; $i < 10000; $i += 2) {
    if (vozrastUbyv($i)) {
        $res[] = $i;
    }
}
print_r($res);

function vozrastUbyv($n = 1234) { //определяет следуют ли цифры по возрастанию
    $cifraV = 10;
    $cifraU = -1;
    $resV = true;
    $resU = true;
    while ($n > 0) {
        $ost = $n % 10;
        if ($ost >= $cifraV) {
            $resV = false;
        }
        if ($ost <= $cifraU) {
            $resU = false;
        }
        $cifraV = $n % 10;
        $cifraU = $cifraV;
        $n /= 10;
        $n = (int) $n;
    }
    return $resV||$resU;
}
