<?php


use Unicate\Translation\Translation;
use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase {

    private $data;

    protected function setUp() {
        $this->data = [
            'en' => [
                'test.token1' => 'Token Text EN 1',
                'test.token2' => 'Token Text EN 2',
            ],
            'de' => [
                'test.token1' => 'Token Text DE 1',
                'test.token2' => 'Token Text DE 2',
            ],
        ];
    }

    public function testToken() {
        $translation = new Translation($this->data);

        $translation->setLang('en');
        $text = $translation->translate('test.token1');
        $this->assertEquals('Token Text EN 1', $text);

        $translation->setLang('de');
        $text = $translation->translate('test.token1');
        $this->assertEquals('Token Text DE 1', $text);
    }

    public function testInvalidLang() {
        $translation = new Translation($this->data);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Missing language "xx" in translation file!');

        $translation->setLang('xx');
        $text = $translation->translate('test.token1');
    }

    public function testInvalidToken() {
        $translation = new Translation($this->data);

        $translation->setLang('en');
        $text = $translation->translate('aaa.bbb');
        $this->assertEquals('aaa.bbb', $text);
    }

    public function testConstructor() {
        $translation = new Translation($this->data, 'de');
        $text = $translation->translate('test.token2');
        $this->assertEquals('Token Text DE 2', $text);

        $translation = new Translation($this->data, 'en');
        $text = $translation->translate('test.token2');
        $this->assertEquals('Token Text EN 2', $text);
    }

}
