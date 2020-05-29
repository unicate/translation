<?php

declare(strict_types=1);

namespace Unicate\Translation;

use Unicate\LanguageDetection\Detection;

class Translation {
    private $lang;
    private $translationDefinition;

    public function __construct(array $translationDefinition, string $lang = null) {
        $this->translationDefinition = $translationDefinition;
        $this->setLang($lang);
    }

    public function setLang($lang) {
        $this->lang = $lang;
    }

    public function getLang(): string {
        return $this->lang;
    }

    public function translate(string $token) {
        if (is_null($this->lang)) {
            throw new \RuntimeException("Language is null. Set it in the constructor or use setLang() method.");
        }
        if (!array_key_exists($this->lang, $this->translationDefinition)) {
            throw new \RuntimeException("Missing language \"$this->lang\" in translation file!");
        }
        if (!array_key_exists($token, $this->translationDefinition[$this->lang])) {
            return $token;
        } else {
            return $this->translationDefinition[$this->lang][$token];
        }
    }
}