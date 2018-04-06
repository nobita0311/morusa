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
        $this->Morusa = new Morusa("jp");
        $this->assertEquals($this->Morusa->toMorseCode("ア"), "－－・－－");
        $this->assertEquals($this->Morusa->toMorseCode("い"), "・－");
        $this->assertEquals($this->Morusa->toMorseCode("アい"), "－－・－－　・－");
        
        $this->assertEquals($this->Morusa->fromMorseCode("－－・－－"), "ア");
        $this->assertEquals($this->Morusa->fromMorseCode("・－"), "イ");
        $this->assertEquals($this->Morusa->fromMorseCode("－－・－－　・－"), "アイ");
    }

}
