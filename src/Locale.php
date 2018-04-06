<?php

namespace nobita0311\Morusa;

abstract class Locale {

    abstract  function toMorseCode($string);

    abstract  function fromMorseCode($string);

}
