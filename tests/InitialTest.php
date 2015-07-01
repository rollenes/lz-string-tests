<?php

class InitialTest extends PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        class_exists('LZString');
    }
} 