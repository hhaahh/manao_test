<?php
/*
  require_once('Mnojestvo.php');
  require_once('Kombinatorika.php');

  //use mnojestvo\Mnojestvo;

  /*$n = 1234; //исходная строка
  $m = 2; //длина итогововой строки
  //$mnojestvoModel = new Mnojestvo($n, $m); */
$m = 6;
$arr = [0, 1, 2, 3];
$count = count($arr);
for ($i1 = $count - 1; $i1 >= 0; $i1--) {
    for ($i = $arr[$i1]; $i < $m; $i++) {
        $z = $arr[$i1] + 1;
        if (!in_array($z, $arr)) {
            $arr[$i1] ++;
        } else {
            $arr = refresh($arr, $i1, $m + 1);
            continue;
        }
        print_r($arr);
    }
}

function refresh($arr, $do, $max) {
    $count = count($arr);
    for ($i = $do + 1; $i < $count; $i++) {
        $i1 = 0;
        $arr[$i] = 0;
        while (in_array($i1, $arr_slice = array_slice($arr, 0, $i))) {
            $i1++;
            $arr[$i] ++;
            if ($max <= $arr[$i]) {
                break;
            }
        }
    }
    return $arr;
}
?>
<pre>
    <?php //$mnojestvoModel->next();  ?>
</pre>