<?php

namespace nobita0311\MorusaTest\Locale;

use nobita0311\Morusa\Locale\ja;

class jaTest extends \PHPUnit_Framework_TestCase {

    function __construct($name = null, array $data = array(), $dataName = '') {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * つかいかた
     */
    public function test_how_to_use() {
        $morusa = new ja();
        //to morse
        $this->assertEquals($morusa->toMorseCode("ア"), "－－・－－");
        $this->assertEquals($morusa->toMorseCode("い"), "・－");
        $this->assertEquals($morusa->toMorseCode("アい"), "－－・－－　・－");
        $this->assertEquals($morusa->toMorseCode("こんにちは。"), "－－－－　・－・－・　－・－・　・・－・　－・・・　・－・－・・");

        $this->assertEquals($morusa->toMorseCode("ゴザ"), "－－－－　・・　－・－・－　・・");

        $this->assertEquals($morusa->toMorseCode("123"), "・－－－－　・・－－－　・・・－－");

        //from morse
        $this->assertEquals($morusa->fromMorseCode("－－・－－"), "ア");
        $this->assertEquals($morusa->fromMorseCode("・－"), "イ");
        $this->assertEquals($morusa->fromMorseCode("－－・－－　・－"), "アイ");

        $this->assertEquals($morusa->fromMorseCode("－－－－　・－・－・　－・－・　・・－・　－・・・　・－・－・・"), "コンニチハ。");
        $this->assertEquals($morusa->fromMorseCode("－－－－　・・　－・－・－　・・"), "ゴザ");

        $this->assertEquals($morusa->fromMorseCode("・－－－－　・・－－－　・・・－－"), "123");
    }

}
