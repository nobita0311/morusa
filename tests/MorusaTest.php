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
        
    }

}
