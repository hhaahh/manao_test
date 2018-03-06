<?php

namespace mnojestvo;

class Mnojestvo {

    public $ishodnArr; // массив со всеми исходными значениями 
    public $keys; // массив с ключами актуальной комбинации
    public $razmer; //размер комбинаций
    public $ishodnRazmer; //исходный размер
    public $str; //исходная строка
    public $lastkey; //последний ключ в актуальной комбинации
    public $vneActualMnoj; //--
    public $actualIndex; //актуальное значение бегунка
    public $actualArr; //актальный массив со значениями

    public function __construct($str = '', $razmer = 0) {
        $this->razmer = $razmer;
        $this->str = $str;
        $this->ishodnArr = str_split($str);
        $this->ishodnRazmer = count($this->ishodnArr) - 1;
        //$this->lastkey = $this->ishodnRazmer - 1;
        $this->lastkey = $razmer - 1;
        $this->keys = range(0, $this->lastkey);
    }

    public function next() {
        $this->actualIndex = $this->lastkey;
        $newkey = 0;
        while ($newkey <= $this->ishodnRazmer) {
            //if ($output = array_slice($input, 0, 3))) {
                $newkey++;
                continue;
            }
            $this->keys[$this->actualIndex] = $newkey;
        }
        return $this->keys;
    }

}
?>