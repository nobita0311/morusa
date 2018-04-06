<?php

namespace nobita0311\MorusaTest\Locale;

use nobita0311\Morusa\Locale\en;

class enTest extends \PHPUnit_Framework_TestCase {

    function __construct($name = null, array $data = array(), $dataName = '') {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * つかいかた
     */
    public function test_how_to_use_en() {
        $morusa = new en();
        $this->assertEquals($morusa->toMorseCode("A"), ".-");
        $this->assertEquals($morusa->toMorseCode("B"), "-...");
        $this->assertEquals($morusa->toMorseCode("AB"), ".- -...");
        $this->assertEquals($morusa->toMorseCode("ab"), ".- -...");

        $this->assertEquals($morusa->toMorseCode("123"), ".---- ..--- ...--");
        
        $this->assertEquals($morusa->toMorseCode(".,?!-/@()"), ".-.-.- --..-- ..--.. -.-.-- -....- -..-. .--.-. -.--. -.--.-");

        $this->assertEquals($morusa->fromMorseCode(".-"), "A");
        $this->assertEquals($morusa->fromMorseCode("-..."), "B");
        $this->assertEquals($morusa->fromMorseCode(".- -..."), "AB");

        $this->assertEquals($morusa->fromMorseCode(".---- ..--- ...--"), "123");
        $this->assertEquals($morusa->fromMorseCode(".-.-.- --..-- ..--.. -.-.-- -....- -..-. .--.-. -.--. -.--.-"), ".,?!-/@()");
    }

}
