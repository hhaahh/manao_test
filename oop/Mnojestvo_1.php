<?php

namespace mnojestvo;

class Mnojestvo {

    public $ishodnArr; // массив со всеми исходными значениями 
    public $actualMnojestvoKeys; // массив с ключами актуальной комбинации
    public $razmer; //размер комбинаций
    public $ishodnRazmer; //исходный размер
    public $str; //исходная строка
    public $lastkey; //последний ключ в актуальной комбинации
    public $vneActualMnoj; //--
    public $actualIndex; //актуальное значение бегунка
    public $actualArr; //актальный массив со значениями

    /*

     * берем последний ключ
     * находим ближайший больший справа;
     * Если нет:
     * переходим на предпоследний,
     * находим ближайший больший справа; // перезаписываем его
     * 
     * когда Нашли:
     * берем индекс правее
     * находим ближайший больший справа //перезаписываем его
     * и т.д.
     * 
     * бегунок на первом элементе
     * смотрим в исходном массиве есть ли правее большее значение
     * если нет 
     * тогда передвигаем бегунок на второй элемент
     * смотрим в исходном массиве есть ли правее большее значение
     * если есть
     * меняем местами с бегунком
     * 
     * начался проход вправо
     * 
     * бегунок вправо
     * записывам в него ближайший больший элемент 
     * начиная от начала перебирая все значения слева
     * 
     *      */

    public function __construct($str = '', $razmer = 0) {
        $this->razmer = $razmer;
        $this->str = $str;
        $this->ishodnArr = str_split($str);
        $this->ishodnRazmer = count($this->ishodnArr);
        //$this->lastkey = $this->ishodnRazmer - 1;
        $this->lastkey = $razmer - 1;
        $this->createActualMnojestvoKeysFirst();
        $this->createActualMnojestvo();
        $this->createVneActualMnojestvo();
    }

    public function generate() {
        
    }

    //123 45
    public function progonVpravо() {
        $newKey = $this->getPerviyBolshiyIndexSpr($this->actualIndex);
        if ($newKey == -1) {
            if ($this->actualIndex > 0) {
                $this->actualIndex--;
                $this->progonVpravо();
            } else {
                //return
            }
        } else {//if ($this->actualIndex < $this->ishodnRazmer) {//перезаписать индекс на новый и перейти на предыдущий
            //мы нашли 
            $this->actualMnojestvoKeys[$this->actualIndex] = $newKey;
            //
            $this->actualIndex++;
            //найти меньшее значение справа и присвоить по актуалиндекс
            $newKey = $this->getMenshiyIndexSpr();
            //if
            $this->progonVlevо();
        }
    }

    public function progonVlevo($param) {
        $newKey = $this->getMenshiyIndexSpr();
        if ($newKey == -1) {
            
        }
    }

    public function createActualMnojestvo() {
        for ($i = 0; $i <= $this->lastkey; $i++) {
            $this->actualArr[$i] = $this->ishodnArr[$this->actualMnojestvoKeys[$i]];
        }
        return;
    }

    public function createActualMnojestvoKeysFirst() {

        for ($i = 0; $i <= $this->lastkey; $i++) { //создаем первую комбинацию ключей
            $this->actualMnojestvoKeys[$i] = $i;
        }
        return;
    }

    public function createVneActualMnojestvo() {
        for ($i = $this->razmer; $i < $this->ishodnRazmer; $i++) {//создаем массив с символами вне актуального множества
            $this->vneActualMnoj[] = $this->ishodnArr[$i];
        }
        return;
    }

    public function haveKeyInActualMnojestvo($key) {
        return isset($this->actualMnojestvoKeys[$key]);
    }

    public function haveIndexSleva($key) {
        foreach ($this->actualMnojestvoKeys as $k => $value) {
            if ($k >= $this->actualIndex) {
                break;
            }
            if ($key == $this->actualMnojestvoKeys[$this->actualIndex]) {
                return true;
            }
        }

        return false;
    }

    public function getPerviyBolshiyIndexSpr($key) {
        while (++$key <= $this->ishodnRazmer) {
            if ($this->haveIndexSleva($key)) {
                continue;
            }

            return $key;
        }
        return -1;
    }

    /*
     * actualMnojestvoKeys = [
     *      key=>key,
     *      key1=>key1,
     * ]
     */

    public function next() {
        $this->actualIndex = $this->lastkey;
        while (true) {
            $newIndex = $this->getPerviyBolshiyIndexSpr($this->actualIndex);
            if ($newIndex != -1) {
                $this->sortIndexesSprava();
                $this->actualMnojestvoKeys[$this->actualIndex] = $newIndex;
            } elseif ($this->actualIndex > 0) {
                $this->actualIndex--;
            } else {
                return false;
            }
            break;
        }
    }

    public function getMenshiyElSprava($key) {
        //
        for ($this->actualIndex; $this->actualIndex <= $this->lastkey; $this->actualIndex++) {
            for ($i1 = $this->actualIndex; $i1 < $this->ishodnRazmer; $i1++) {//перебераем массив
                
                if ($this->actualMnojestvoKeys[$this->actualIndex] > $i1) {
                    break;
                } else {
                    if (!$this->haveIndexSleva($i1)) {
                        $this->actualMnojestvoKeys[$i] = $i1;
                    }
                }
            }
        }
    }

    public function sortIndexesSprava() {
        //отсортировать индексы по возрастанию расположеные старше actualindex
        $min = 0;
        for ($this->actualIndex; $this->actualIndex < $this->ishodnRazmer; $this->actualIndex++) {
            $this->getMenshiyElSprava();
        }
    }

}
?>