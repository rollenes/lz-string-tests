<?php

class CompressDecompressTest extends PHPUnit_Extensions_SeleniumTestCase
{
    private $browserPath = 'http://localhost:1230';

    protected function setUp()
    {
        $this->setBrowser('*firefox');
        $this->setBrowserUrl($this->browserPath);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testJs2Php($input)
    {
        $this->open($this->browserPath);

        $this->type('toCompress', $input);

        $this->click('compress');

        $decompressed = \LZString::decompressFromBase64($this->getValue('compressed'));

        $this->assertEquals($input, $decompressed);
    }

    public function dataProvider()
    {
        return [
            ['mama'],
            ['tata'],
            ['ąść']
        ];
    }
}
