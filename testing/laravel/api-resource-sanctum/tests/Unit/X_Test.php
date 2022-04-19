<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class X_Test extends TestCase
{
    public function test_example()
    {
        $x = 10;
        $y = 20;
        $r = $x + $y;
        $this->assertEquals($r,30);
        // $this->assertTrue($r === 30);
    }
}
