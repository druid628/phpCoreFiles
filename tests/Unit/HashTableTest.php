<?php

namespace tests\Unit;

use DruiD628\Primatives\HashTable628;
use PHPUnit\Framework\TestCase;

class HashTableTest extends TestCase
{

    public function testCount()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('4', $hashtable628->count());
    }

    public function testImplode()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertInstanceOf('\DruiD628\Primatives\String628', $hashtable628->implode(" "));
    }

    public function testNext()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('abc', $hashtable628->current());
        $hashtable628->next();
        $this->assertEquals('bcd', $hashtable628->current());
    }

    public function testPrev()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('abc', $hashtable628->current());
        $hashtable628->next();
        $hashtable628->next();
        $this->assertEquals('cde', $hashtable628->current());
        $hashtable628->prev();
        $this->assertEquals('bcd', $hashtable628->current());

    }

    public function testCurrent()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals('abc', $hashtable628->current());
    }

    public function testKey()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $hashtable628->next();
        $this->assertEquals('b', $hashtable628->key());
    }

    public function testsetData()
    {
        $arrayData = [
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ];

        $hashtable628 = new HashTable628();
        $hashtable628->setData($arrayData);

        $this->assertEquals($arrayData, $hashtable628->getData());
    }

    public function testRewind()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $hashtable628->next();
        $hashtable628->next();
        $hashtable628->next();
        $this->assertEquals('d', $hashtable628->key());
        $hashtable628->rewind();
        $this->assertEquals('a', $hashtable628->key());

    }

    public function testOffsets()
    {
        $hashtable628   = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);
        $stuffAndThangs = 'stuff and thangs';
        $this->assertTrue($hashtable628->offsetExists('a'));
        $this->assertFalse($hashtable628->offsetExists('z'));
        $this->assertEquals('abc', $hashtable628->offsetGet('a'));
        $hashtable628->offsetSet('z', $stuffAndThangs);
        $this->assertTrue($hashtable628->offsetExists('z'));
        $this->assertEquals($stuffAndThangs, $hashtable628->offsetGet('z'));
        $hashtable628->offsetUnset('z');
        $this->assertFalse($hashtable628->offsetExists('z'));
    }

    public function testInterfaces()
    {
        $hashtable628 = new HashTable628();
        $this->assertInstanceOf('\ArrayAccess', $hashtable628);
        $this->assertInstanceOf('\Iterator', $hashtable628);
        $this->assertInstanceOf('\DruiD628\Primatives\Base\Contracts\ArrayInterface', $hashtable628);
    }


    public function testGetKeys()
    {
        $hashtable628 = new HashTable628([
            'a' => 'abc',
            'b' => 'bcd',
            'c' => 'cde',
            'd' => 'def',
        ]);

        $this->assertEquals(['a', 'b', 'c', 'd'], $hashtable628->getKeys());
    }


    public function testKeyValidation()
    {
        try {

        $hashtable628 = new HashTable628([
            0 => 'abc',
            1 => 'bcd',
            2 => 'cde',
            3 => 'def',
        ]);
        } catch (\Exception $e) {
            $this->assertInstanceOf('\DruiD628\Exceptions\InvalidKeyTypeException', $e);
        }

    }
}