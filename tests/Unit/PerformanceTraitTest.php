<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use com\druid628\Traits\PerformanceTrait;

class MockPerfTraitClass
{
    use PerformanceTrait;
}

class PerformanceTraitTest extends TestCase
{

    public function testGetPerformance()
    {
        $mock = new MockPerfTraitClass();

        $perfData = $mock->getPerformance();

        $this->assertContains('bytes', $perfData);

    }
}