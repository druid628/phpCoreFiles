<?php

namespace tests\Unit;

use com\druid628\Primatives\Array628;
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{

    public function testCount()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('4', $array628->count());
    }

    public function testImplode()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertInstanceOf('\com\druid628\Primatives\String628', $array628->implode( " "));
    }

    public function testNext()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('abc', $array628->current());
        $array628->next();
        $this->assertEquals('bcd', $array628->current());
    }

    public function testPrev()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('abc', $array628->current());
        $array628->next();
        $array628->next();
        $this->assertEquals('cde', $array628->current());
        $array628->prev();
        $this->assertEquals('bcd', $array628->current());

    }

    public function testCurrent()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('abc', $array628->current());
    }

    public function testKey()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $array628->next();
        $this->assertEquals('b', $array628->key());
    }

    public function testsetData()
    {
        $arrayData = [
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ];

        $array628 = new Array628();
        $array628->setData($arrayData);

        $this->assertEquals($arrayData, $array628->getData());
    }

    public function testRewind()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $array628->next();
        $array628->next();
        $array628->next();
        $this->assertEquals('d', $array628->key());
        $array628->rewind();
        $this->assertEquals('a', $array628->key());

    }

    public function testOffsets()
    {
        $array628 = new Array628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);
        $stuffAndThangs = 'stuff and thangs';
        $this->assertTrue($array628->offsetExists('a'));
        $this->assertFalse($array628->offsetExists('z'));
        $this->assertEquals('abc', $array628->offsetGet('a'));
        $array628->offsetSet('z', $stuffAndThangs );
        $this->assertTrue($array628->offsetExists('z'));
        $this->assertEquals($stuffAndThangs , $array628->offsetGet('z'));
        $array628->offsetUnset('z');
        $this->assertFalse($array628->offsetExists('z'));
    }

    public function testInterfaces()
    {
         $array628 = new Array628();
         $this->assertInstanceOf('\ArrayAccess', $array628);
         $this->assertInstanceOf('\Iterator', $array628);
    }
}
