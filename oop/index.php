<?php
$start = microtime(true);

class Mnojestvo {

    public $ishodnArr; // массив со всеми исходными символами
    public $razmer; //длина получаемой строки
    public $ishodnRazmer; //исходный размер строки
    public $str; //исходная строка
    public $last; //последний ключ массива $arr 
    public $arr; //массив с ключами образуемой новой строки
    public $result; //массив со всеми новыми строками
    public $pos; //ключ массива $arr указывающий позицию на которой мы находимся в момент формирования новой строки
    public $m; //последний ключ массива $ishodnArr

    public function __construct($str = '', $razmer = 0) {
        $this->razmer = $razmer;
        $this->last = $this->razmer - 1;
        $this->str = $str;
        $this->ishodnArr = str_split($str);
        $this->ishodnRazmer = count($this->ishodnArr);
        $this->m = $this->ishodnRazmer - 1;
        $this->arr = range(0, $this->razmer - 1);
    }

    /*
     * Преобразуем ключи $arr в строку и заносим ее в массив $result
     */

    public function getWord() {
        $this->str = '';
        for ($i = 0; $i < $this->razmer; $i++) {
            $this->str .= $this->ishodnArr[$this->arr[$i]];
        }
        $this->result[] = $this->str;
    }

    /*
     * Увеличиваем последний элемент массива $arr исключая совпадения с другими элементами
     * и заносим все корректные полученные экземпляры массива $arr в массив $result с помощью getWord()
     */

    public function lastElementIterations() {
        $psevdo_arr = array_slice($this->arr, 0, $this->pos);
        for ($i = $this->arr[$this->pos] + 1; $i <= $this->m; $i++) {
            if (!in_array($i, $psevdo_arr)) {
                $this->arr[$this->pos] = $i;
                $this->getWord();
            }
        }
    }

    /*
     * Ищем в массиве $arr значение которое мы можем увеличить, увеличиваем, 
     * формируем оставшуюся часть с помощью refresh() и сохраняем.
     */

    public function otherElementIteration() {
        while ($this->pos-- > 0) {
            $psevdo_arr = array_slice($this->arr, 0, $this->pos);
            if ($this->arr[$this->pos] ++ < $this->m) {
                if (in_array($this->arr[$this->pos], $psevdo_arr)) {
                    $this->pos++;
                } else {
                    break;
                }
            } elseif ($this->pos == 0) {
                return false;
            }
        }
        $this->refresh();
        $this->getWord();
        return true;
    }

    /*
     * Получаем все варианты строк указанной длины из исходного набора символов 
     */

    public function getWords() {
        while ($this->otherElementIteration()) {
            $this->pos = $this->last;
            $this->lastElementIterations();
        }
        return $this->result;
    }

    /*
     * Формирует часть $arr (всё что больше $pos) минимальными значениями
     */

    public function refresh() {
        $count = count($this->arr);
        for ($i = $this->pos + 1; $i < $count; $i++) {
            $i1 = 0;
            $this->arr[$i] = 0;
            while (in_array($i1, $arr_slice = array_slice($this->arr, 0, $i))) {
                $i1++;
                $this->arr[$i] ++;
                if ($this->m <= $this->arr[$i]) {
                    break;
                }
            }
        }
        return $this->arr;
    }

    /*
     * Количество комбинаций
     */

    public function combCount($razmerMnoj, $razmerPodmnoj) {
        $res = $this->factorial($razmerMnoj) / $this->factorial($razmerMnoj - $razmerPodmnoj);
        return $res;
    }

    /*
     * Факториал числа
     */

    private function factorial($value) {
        if ($value == 0) {
            return 1;
        } else {
            return $value * $this->factorial($value - 1);
        }
    }

}

$memory = memory_get_usage();
$n = '0123456789'; //исходная строка
$m = 5; //длина итогововой строки
$mnojestvoModel = new Mnojestvo($n, $m);

$razmerItog = $mnojestvoModel->combCount($mnojestvoModel->ishodnRazmer, $mnojestvoModel->razmer);
?>

<pre>
    Необходимый размер: <?= $razmerItog ?> 
    Строка: <?= $n ?>(N)
    Длина итоговой строки: <?= $m ?>(M)
    <?php print_r($mnojestvoModel->getWords()); ?>
    Задействовано памяти: <?= ((memory_get_usage() - $memory) / 1024) / 1024 ?> Мб
    Время выполнения: <?= $time = microtime(true) - $start ?> сек
</pre>