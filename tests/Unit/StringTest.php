<?php

namespace tests\Unit;

use com\druid628\Primatives\String628;
use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{

    public function testStringlength()
    {
        $string628 = new String628("stuff and thangs");
        $this->assertEquals(16, $string628->length());
    }


    public function testUpper()
    {
        $string628 = new String628("stuff and thangs");
        $this->assertEquals('STUFF AND THANGS', $string628->upper());
    }

    public function testLower()
    {
        $string628 = new String628("stuff and thangs");
        $this->assertEquals('stuff and thangs', $string628->lower());

    }

    public function testExplosion()
    {
        $string628 = new String628("stuff and thangs Coral");
        $array628 = $string628->explode(" ");
        $this->assertInstanceOf("\com\druid628\Primatives\Array628", $array628);
    }

    public function testGetValue()
    {
        $stringValue = 'Stuff & Thangs Coral';
        $string628 = new String628($stringValue);
        $this->assertEquals($stringValue, $string628->getValue());

    }

    public function testSetValue()
    {
        $stringValue = 'Stuff & Thangs Coral';
        $string628 = new String628();
        $string628->setValue($stringValue);
        $this->assertEquals($stringValue, $string628->getValue());

    }

    public function testToString()
    {
        $stringValue = 'Stuff & Thangs Coral';
        $string628 = new String628($stringValue);
        $this->assertEquals($stringValue, "${string628}");

    }
}
