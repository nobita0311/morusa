<?php

namespace nobita0311\Morusa;

class Morusa {

    private $locale = 'en';
    private $provider;

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
            $this->locale = $locale;
            $this->provider = new $class_name;
            return new $class_name;
        } else {
            //err
        }
        return $this;
    }

    public function toMorseCode($string) {
        return $this->provider->toMorseCode($string);
    }

    public function fromMorseCode($string) {
        return $this->provider->fromMorseCode($string);
    }

}
