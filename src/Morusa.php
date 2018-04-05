<?php

namespace nobita0311\Morusa;

class Morusa {

    //short point
    private $short = ".";
    //long point
    private $long = "-";

    public function __construct($locale = 'en') {
        $this->setLocale($locale);
    }

    /**
     * 
     * @param type $locale
     * @return $this
     */
    public function setLocale($locale) {
        $class_name = 'nobita0311\Morusa\\' . sprintf('Locale\%s', $locale);
        if (class_exists($class_name, true)) {
            return new $class_name;
        } else {
            //err
        }
        return $this;
    }

}
