<?php

namespace nobita0311\Morusa;

class Morusa {

    private $locale = 'en';
    private $provider;

    public function __construct($locale = 'en') {
        $this->setLocale($locale);
        return $this;
    }

    /**
     * 
     * @param type $locale
     * @return $this
     */
    public function setLocale($locale) {
        $class_name = 'nobita0311\\Morusa\\' . sprintf('Locale\%s', $locale);
        if (class_exists($class_name, true)) {
            $this->locale = $locale;
            $this->provider = new $class_name;
        } else {
            //err
        }
        return $this;
    }

    public function setShort($string) {
        $this->provider->setShort($string);
        return $this;
    }

    public function setLong($string) {
        $this->provider->setLong($string);
        return $this;
    }

    public function setSpace($string) {
        $this->provider->setSpace($string);
        return $this;
    }

    public function toMorseCode($string) {
        return $this->provider->toMorseCode($string);
    }

    public function fromMorseCode($string) {
        return $this->provider->fromMorseCode($string);
    }

}
