<?php

class Mnojestvo {

    public $word; //текущее слово
    public $words; //массив со всеми новыми строками
    public $razmer; //длина получаемой строки
    public $str; //начальная строка
    protected $strArr; // массив со всеми исходными символами
    protected $arr; //массив с ключами образуемой новой строки
    protected $pos; //ключ массива $arr указывающий позицию на которой мы находимся в момент формирования новой строки
    protected $last; //последний ключ массива $ishodnArr

    public function __construct($str = '', $razmer = 0) {
        $this->razmer = $razmer;
        $this->pos = $this->razmer;
        $this->word = $str;
        $this->str = $str;
        $this->strArr = str_split($str);
        $this->last = count($this->strArr) - 1;
        $this->arr = range(0, $this->razmer - 1);
    }

    public function setWords() {
        $this->words = [$this->getWord()];
        while ($this->arrIteration()) {
            $this->words[] = $this->getWord(); //записываем новое слово исходя из массива $arr
        }
        return count($this->words);
    }

    public function arrIteration() {
        while ($this->pos-- > 0) {
            if ($this->setValidValue()) { //устанавливаем максимально допустимое значение на текущей позиции в $arr
                $this->resetArrRight(); //записываем минимальные допустимые значения справа от найденного
                return true; //мы нашли и записали новый ключ
            }
        }
        return false;
    }

    public function getWord() {
        $this->word = '';
        foreach ($this->arr as $key) {
            $this->word .= $this->strArr[$key];
        }
        return $this->word;
    }

    protected function resetArrRight() {
        while (++$this->pos < $this->razmer) {
            $this->arr[$this->pos] = -1;
            $this->setValidValue();
        }
        return $this->pos;
    }

    protected function setValidValue() {
        while ($this->arr[$this->pos] ++ < $this->last) {
            if ($this->noneLeft()) {
                return true;
            }
        }
        return false;
    }

    protected function noneLeft() {
        for ($key = 0; $key < $this->pos; $key++) {
            if ($this->arr[$key] === $this->arr[$this->pos]) {
                return false;
            }
        }
        return true;
    }

    public function combCount($razmerMnoj, $razmerPodmnoj) {
        $res = $this->factorial($razmerMnoj) / $this->factorial($razmerMnoj - $razmerPodmnoj);
        return $res;
    }

    public function factorial($value) {
        if ($value == 0) {
            return 1;
        } else {
            return $value * $this->factorial($value - 1);
        }
    }

}

$start = microtime(true);
$memory = memory_get_usage();
$n = '012345678'; //исходная строка
$m = 3; //длина итогововой строки
$mnojestvoModel = new Mnojestvo($n, $m);
$razmerItog = $mnojestvoModel->combCount(strlen($n), $m);
$mnojestvoModel->setWords();
?>

<pre>
    Необходимый размер: <?= $razmerItog ?> 
    Строка: <?= $n ?>(N)
    Длина итоговой строки: <?= $m ?>(M)
    <?php
    print_r($mnojestvoModel->words);
    ?>
    <!--Задействовано памяти: <?= ((memory_get_usage() - $memory) / 1024) / 1024 ?> Мб-->
    Время выполнения: <?= $time = microtime(true) - $start ?> сек
</pre>