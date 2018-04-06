<?php

namespace nobita0311\MorusaTest;

use nobita0311\Morusa\Morusa;

/**
 * Class CollectionTest
 * @package CollectionTest
 */
class MorusaTest extends \PHPUnit_Framework_TestCase {

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
