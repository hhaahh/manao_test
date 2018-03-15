<?php

Class Worder {

    private $chars = array();
    private $code = array();
    private $index = NULL;
    private $last = NULL;
    private $length = NULL;
    public $counter = 0;

    function __construct($chars, $length) {
        if (strlen($chars) && $lenght = intval($length)) {
            $this->chars = str_split($chars);
            $this->length = $length;
            $this->index = $this->length - 1;
            $this->code = range(0, $this->index);
            $this->last = count($this->chars) - 1;
        }
    }

    private function refresh() {
        $end = $this->last + 1;
        $arIndexs = array();
        $arIndexs = array_keys($this->code, null, true);
        if ($arIndexs) {
            foreach ($arIndexs as $index) {
                for ($i = 0; $i < $end; $i++) {
                    if (!in_array($i, $this->code, true)) {
                        $this->code[$index] = $i;
                        break;
                    }
                }
            }
        }
        unset($arIndexs);
        $this->index = $this->length - 1;
    }

    function getWords() {
        $arWords = array();
        while ($word = $this->getWord()) {
            $arWords[] = $word;
        }
        return $arWords;
    }

    private function setCode() {
        if ($this->counter == 0) {
            return true;
        }
        if ($this->setIndex()) {
            if ($this->setCodeByIndex()) {
                $this->refresh();
                return true;
            }
        }
        return false;
    }

    private function setIndex() {
        if ($this->index == -1) {
            return false;
        }
        if ($this->code[$this->index] == $this->last && $this->index == 0) {
            return false;
        }
        if ($this->code[$this->index] == $this->last || $this->code[$this->index] === null) {
            $this->code[$this->index] = null;
            $this->index --;
            $this->setIndex();
        }
        return true;
    }

    private function setCodeByIndex() {
        $i = $this->code[$this->index] + 1;
        $end = $this->last + 1;
        while ($i != $end) {
            if (in_array($i, $this->code, true)) {
                if ($i == $this->last) {
                    $this->code[$this->index] = null;
                    break;
                }
                $i++;
                continue;
            }
            $this->code[$this->index] = $i;
            break;
        }
        if ($this->code[$this->index] === null) {
            $this->index --;
            if ($this->setIndex()) {
                return $this->setCodeByIndex();
            }
            return false;
        }
        return true;
    }

    private function getWordByCode() {
        $word = "";
        foreach ($this->code as $index) {
            $word .= $this->chars[$index];
        }
        $this->counter ++;
        return $word;
    }

    private function getWord() {
        if ($this->setCode()) {
            return $this->getWordByCode();
        }
        return false;
    }

}
$memory = memory_get_usage();
$w = new Worder("12345", 5);
echo '<pre>' . print_r($w->getWords(), true) . '</pre>';
echo (memory_get_usage()-$memory)/1024/1024;