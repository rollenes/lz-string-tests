<?php

class CompressDecompressTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowser('*firefox');
        $indexPath = 'http://localhost:1230';
        $this->setBrowserUrl($indexPath);
    }

    /**
     * @dataProvider testDataProvider
     */
    public function testJs2Php($input)
    {
        $indexPath = 'http://localhost:1230';
        $this->open($indexPath);

        $this->type('toCompress', $input);

        $this->click('compress');

        $decompressed = \LZString::decompressFromBase64($this->getValue('compressed'));

        $this->assertEquals($input, $decompressed);
    }

    public function testDataProvider()
    {
        return [
            ['mama'],
            ['tata']
        ];
    }
} 