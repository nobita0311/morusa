<?php

namespace nobita0311\Morusa\Locale;

use nobita0311\Morusa\Locale;

class en extends Locale {

    //short point
    protected $short = '.';
    //long point
    protected $long = '-';
    //spacer
    protected $space = ' ';
    protected $codes = array(
        'A' => '01',
        'B' => '1000',
        'C' => '1010',
        'D' => '100',
        'E' => '0',
        'F' => '0010',
        'G' => '110',
        'H' => '0000',
        'I' => '00',
        'J' => '0111',
        'K' => '101',
        'L' => '0100',
        'M' => '11',
        'N' => '10',
        'O' => '111',
        'P' => '0110',
        'Q' => '1101',
        'R' => '010',
        'S' => '000',
        'T' => '1',
        'U' => '001',
        'V' => '0001',
        'W' => '011',
        'X' => '1001',
        'Y' => '1011',
        'Z' => '1100',
    );

    public function toMorseCode($string) {
        $split = $this->split_string($string);
        $return = "";
        foreach ($split as $char) {
            if (isset($this->codes[$char])) {
                $code = $this->codes[$char];
                $string = $this->to_morse($code);
                $return .= $string . $this->space;
            }
        }
        return preg_replace('/[ 　]+$/u', '', $return);
    }

    public function fromMorseCode($string) {
        $split = $this->split_morse($string);
        $return = "";
        foreach ($split as $code) {
            $_code = $this->from_morse($code);
            $char = array_search($_code, $this->codes);
            if ($char) {
                $return .= $char;
            }
        }
        return trim($return);
    }

}
