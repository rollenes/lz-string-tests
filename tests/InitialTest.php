<?php

class InitialTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowser('*firefox');
        $indexPath = 'http://localhost:1230';
        $this->setBrowserUrl($indexPath);
    }

    public function testTitle()
    {
        $indexPath = 'http://localhost:1230';
        $this->open($indexPath);
        $this->assertTitle('Compress me');
    }
} 