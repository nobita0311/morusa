<?php

namespace nobita0311\Morusa\Locale;

use nobita0311\Morusa\Locale;

class jp extends Locale {

    //short point
    protected $short = '・';
    //long point
    protected $long = '－';
    //spacer
    protected $space = '　';
    //
    protected $codes = array(
        'イ' => '01',
        'ロ' => '0101',
        'ハ' => '1000',
        'ニ' => '1010',
        'ホ' => '100',
        'ヘ' => '0',
        'ト' => '00100',
        'チ' => '0010',
        'リ' => '110',
        'ヌ' => '0000',
        'ル' => '10110',
        'ヲ' => '0111',
        'ワ' => '101',
        'カ' => '0100',
        'ヨ' => '11',
        'タ' => '10',
        'レ' => '111',
        'ソ' => '1110',
        'ツ' => '0110',
        'ネ' => '1101',
        'ナ' => '010',
        'ラ' => '000',
        'ム' => '1',
        'ウ' => '001',
        'ヰ' => '01001',
        'ノ' => '0011',
        'オ' => '01000',
        'ク' => '0001',
        'ヤ' => '011',
        'マ' => '1001',
        'ケ' => '1011',
        'フ' => '1100',
        'コ' => '1111',
        'エ' => '10111',
        'テ' => '01011',
        'ア' => '11011',
        'サ' => '10101',
        'キ' => '10100',
        'ユ' => '10011',
        'メ' => '10001',
        'ミ' => '00101',
        'シ' => '11010',
        'ヱ' => '01100',
        'ヒ' => '11001',
        'モ' => '10010',
        'セ' => '01110',
        'ス' => '11101',
        'ン' => '01010',
        //
        'ー' => '01010',
    );

    public function toMorseCode($string) {
        $_split = $this->split_string($string);
        $split = array_map(array($this, 'convert_kana'), $_split);
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
