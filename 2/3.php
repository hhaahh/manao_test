<?php
/*
 * 3. В массиве А(N) первый положительный элемент и последний отрицательный элемент переставить местами.
 */
$n = 5;
$a = [-1, 2, 3, -4, 5];

echo "<pre>";
print_r($a);
echo "</pre>";

$first_i = -1;
$last_i = -1;

for ($i = 0; $i < $n; $i++) {
    if ($a[$i] >= 0 && $first_i < 0) {
        $first_i = $i;
    } elseif ($a[$i] < 0) {
        $last_i = $i;
    }
}
if ($first_i >= 0 && $last_i >= 0) {
    $p = $a[$first_i];
    $a[$first_i] = $a[$last_i];
    $a[$last_i] = $p;
}
?>

<pre>
    <?php print_r($a) ?>
</pre>
