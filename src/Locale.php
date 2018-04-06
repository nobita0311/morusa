<?php

namespace nobita0311\Morusa;

abstract class Locale {

    //short point
    protected $short;
    //long point
    protected $long;
    //spacer
    protected $space;

    abstract function toMorseCode($string);

    abstract function fromMorseCode($string);

    protected function split_string($strings) {
        return preg_split("//u", $strings, -1, PREG_SPLIT_NO_EMPTY);
    }

    protected function split_morse($string) {
        return explode($this->space, $string);
    }

    protected function convert_kana($char) {
        return mb_convert_kana($char, "KVC");
    }

    protected function to_morse($code) {
        return str_replace(array('0', '1', ' '), array($this->short, $this->long, $this->space), $code);
    }

    protected function from_morse($char) {
        return str_replace(array($this->short, $this->long, $this->space), array('0', '1', ' '), $char);
    }

}
