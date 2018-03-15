<?php

/*
 * 5. В массиве А(N) найти максимальный и минимальный элементы и  переставить их местами.  
 */

$n = 6;
$a = [1, 2, 3, 10, 5, 6];
$max = $min = ['value' => $a[0], 'key' => 0];
for ($i = 1; $i < $n; $i++) {
    if ($min['value'] < $a[$i]) {
        $min = ['value' => $a[$i], 'key' => $i];
    } elseif ($max['value'] > $a[$i]) {
        $max = ['value' => $a[$i], 'key' => $i];
    }
}
if ($max['key'] != $min['key']) {
    $a[$min['key']] = $max['value'];
    $a[$max['key']] = $min['value'];
}
?>

<pre>
    <?php print_r($a) ?>
</pre>