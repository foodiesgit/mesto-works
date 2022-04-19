<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;

class TestDuplication extends TestCase
{
    public function test_sum()
    {
        $x = 10;
        $y = 20;
        $r = $x + $y;
        $this->assertEquals($r, 30);
        // $this->assertTrue($r === 30);
    }
}
