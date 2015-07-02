<?php

class CompressDecompressTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowser('*firefox');
        $indexPath = 'http://localhost:1230';
        $this->setBrowserUrl($indexPath);
    }

    public function testJs2Php()
    {
        $indexPath = 'http://localhost:1230';
        $this->open($indexPath);

        $this->type('toCompress', 'mama');

        $this->click('compress');

        $decompressed = \LZString::decompressFromBase64($this->getValue('compressed'));

        $this->assertEquals('mama', $decompressed);
    }
} 