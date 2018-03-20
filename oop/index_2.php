<?php

class Mnojestvo {

    public $ishodnArr; // массив со всеми исходными значениями 
    public $razmer; //размер комбинаций
    public $ishodnRazmer; //исходный размер
    public $str; //исходная строка
    public $arr;
    public $result;

    public function __construct($str = '', $razmer = 0) {
        $this->razmer = $razmer;
        $this->str = $str;
        $this->ishodnArr = str_split($str);
        $this->ishodnRazmer = count($this->ishodnArr);
    }

    public function getWord() {
        $this->str = '';
        for ($i = 0; $i < $this->razmer; $i++) {
            $this->str .= $this->ishodnArr[$this->arr[$i]];
        }
        $this->result[] = $this->str;
    }

    public function getWords() {
        $m = $this->ishodnRazmer - 1;

        $count = $this->razmer;
        $this->arr = range(0, $this->razmer - 1);

        $pos = $count - 1;
        $this->getWord();
        while (true) {
            for ($i = $this->arr[$pos]; $i < $m; $i++) {
                $z = $i + 1;
                $psevdo_arr = array_slice($this->arr, 0, $pos);
                if (!in_array($z, $psevdo_arr)) {
                    $this->arr[$pos] = $z;
                } else {
                    continue;
                }

                $this->getWord();
            }
            while ($pos > 0) {
                $psevdo_arr = array_slice($this->arr, 0, --$pos);
                if ($this->arr[$pos] < $m) {
                    if (in_array($this->arr[$pos] + 1, $psevdo_arr)) {
                        if (($this->arr[$pos] + 2) <= $m) {
                            $this->arr[$pos] ++;
                        } else {
                            if ($pos == 1 && $this->arr[$pos] == $m - 1) {
                                return $this->result;
                            }
                            continue;
                        }
                        $pos++;
                        continue;
                    }
                    $this->arr[$pos] ++;
                    break;
                }
            }
            $arr = $this->refresh($pos + 1, $m);

            $this->getWord();
            $pos = $count - 1;
        }
    }

    public function refresh($do, $max) {
        $count = count($this->arr);
        for ($i = $do; $i < $count; $i++) {
            $i1 = 0;
            $this->arr[$i] = 0;
            while (in_array($i1, $arr_slice = array_slice($this->arr, 0, $i))) {
                $i1++;
                $this->arr[$i] ++;
                if ($max <= $this->arr[$i]) {
                    break;
                }
            }
        }
        return $this->arr;
    }
    public function combCount($razmerMnoj, $razmerPodmnoj) {
        $res = $this->factorial($razmerMnoj)/$this->factorial($razmerMnoj-$razmerPodmnoj);
        return $res;
    }

    private function factorial($value) {
        if ($value == 0) {
            return 1;
        } else {
            return $value * $this->factorial($value - 1);
        }
    }

}

$memory = memory_get_usage();
$n = "12345"; //исходная строка
$m = 5; //длина итогововой строки
$mnojestvoModel = new Mnojestvo($n, $m);

$razmerItog = $mnojestvoModel->combCount($mnojestvoModel->ishodnRazmer, $mnojestvoModel->razmer);
?>

<pre>
    Необходимый размер: <?= $razmerItog ?> 
    Строка: <?= $n ?>(N)
    Длина итоговой строки: <?= $m ?>(M)
    <?php print_r($mnojestvoModel->getWords()); ?>
    Память: <?= (memory_get_usage()-$memory)/1024/1024 ?>

</pre>