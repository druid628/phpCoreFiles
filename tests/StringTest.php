<?php

use com\druid628\Primatives\String628;


class StringTest extends PHPUnit_Framework_TestCase
{

    public function testStringCount()
    {
        $x = new String628("stuff and thangs");
        $this->assertEquals(16, $x->count());
    }

}
