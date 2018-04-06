<?php

namespace nobita0311\Morusa\Locale;

use nobita0311\Morusa\Locale;

class ja extends Locale {

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
        //濁点,半濁点
        'ガ' => '0100 00',
        'ギ' => '10100 00',
        'グ' => '0001 00',
        'ゲ' => '1011 00',
        'ゴ' => '1111 00',
        'ザ' => '10101 00',
        'ジ' => '11010 00',
        'ズ' => '11101 00',
        'ゼ' => '01110 00',
        'ゾ' => '1110 00',
        'ダ' => '10 00',
        'ヂ' => '0010 00',
        'ヅ' => '0110 00',
        'デ' => '01011 00',
        'ド' => '00100 00',
        'バ' => '1000 00',
        'ビ' => '11001 00',
        'ブ' => '1100 00',
        'ベ' => '0 00',
        'ボ' => '100 00',
        'パ' => '1000 00110',
        'ピ' => '11001 00110',
        'プ' => '1100 00110',
        'ペ' => '0 00110',
        'ポ' => '100 00110',
        //記号
        'ー' => '01101',
        '、' => '010101',
        '。' => '010100',
        '（' => '101101',
        '）' => '010010',
    );
    //拗音、促音
    private $yousokuon = array(
        "ァ" => "ア",
        "ィ" => "イ",
        "ゥ" => "ウ",
        "ェ" => "エ",
        "ォ" => "オ",
        "ッ" => "ツ",
        "ャ" => "ヤ",
        "ュ" => "ユ",
        "ョ" => "ヨ",
        "ヮ" => "ワ",
    );

    private function convert_yousokuon($string) {
        $keys = array_keys($this->yousokuon);
        $values = array_values($this->yousokuon);
        return str_replace($keys, $values, $string);
    }

    public function toMorseCode($string) {
        $string = $this->convert_yousokuon($string);
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
