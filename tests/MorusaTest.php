<?php

namespace nobita0311\MorusaTest;

use nobita0311\Morusa\Morusa;

/**
 * Class CollectionTest
 * @package CollectionTest
 */
class TenzyTest extends \PHPUnit_Framework_TestCase {

    function __construct($name = null, array $data = array(), $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->Morusa = new Morusa();
    }

    /**
     * @test
     */
    public function test_dummy() {
        $this->assertInstanceOf("nobita0311\Morusa\Morusa", $this->Morusa);
    }

    /**
     * つかいかた
     */
    public function test_how_to_use() {
        $this->Morusa = new Morusa("ja");
        $this->assertEquals($this->Morusa->toMorseCode("ア"), "－－・－－");
        $this->assertEquals($this->Morusa->toMorseCode("い"), "・－");
        $this->assertEquals($this->Morusa->toMorseCode("アい"), "－－・－－　・－");
        $this->assertEquals($this->Morusa->toMorseCode("こんにちは。"), "－－－－　・－・－・　－・－・　・・－・　－・・・　・－・－・・");

        $this->assertEquals($this->Morusa->toMorseCode("ゴザ"), "－－－－　・・　－・－・－　・・");

        $this->assertEquals($this->Morusa->fromMorseCode("－－・－－"), "ア");
        $this->assertEquals($this->Morusa->fromMorseCode("・－"), "イ");
        $this->assertEquals($this->Morusa->fromMorseCode("－－・－－　・－"), "アイ");

        $this->assertEquals($this->Morusa->fromMorseCode("－－－－　・－・－・　－・－・　・・－・　－・・・　・－・－・・"), "コンニチハ。");
        $this->assertEquals($this->Morusa->fromMorseCode("－－－－　・・　－・－・－　・・"), "ゴザ");
    }

    public function test_how_to_use_en() {
        $this->Morusa = new Morusa("en");
        $this->assertEquals($this->Morusa->toMorseCode("A"), ".-");
        $this->assertEquals($this->Morusa->toMorseCode("B"), "-...");
        $this->assertEquals($this->Morusa->toMorseCode("AB"), ".- -...");

        $this->assertEquals($this->Morusa->fromMorseCode(".-"), "A");
        $this->assertEquals($this->Morusa->fromMorseCode("-..."), "B");
        $this->assertEquals($this->Morusa->fromMorseCode(".- -..."), "AB");
    }

    public function test_method_chain() {
        $this->Morusa = new Morusa();
        $output = (new Morusa())
                ->setLocale("ja")
                ->setShort("★")
                ->setLong("☆")
                ->setSpace("＊")
                ->toMorseCode("キラキラボシ");
        $this->assertEquals($output, "☆★☆★★＊★★★＊☆★☆★★＊★★★＊☆★★＊★★＊☆☆★☆★");
        $output = (new Morusa())
                ->setLocale("ja")
                ->setShort("★")
                ->setLong("☆")
                ->setSpace("＊")
                ->fromMorseCode("☆★☆★★＊★★★＊☆★☆★★＊★★★＊☆★★＊★★＊☆☆★☆★");
        $this->assertEquals($output, "キラキラボシ");
    }

}
