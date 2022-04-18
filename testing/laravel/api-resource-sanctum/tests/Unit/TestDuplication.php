<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
class TestDuplication extends TestCase
{
    //duplication------------------------------------------------------------
    public function test_duplication()
    {
      $user1 = User::make([
          'name' => 'Test',
          'email' => 'test@test.com'
      ]);

      $user2 = User::make([
          'name' => 'Test2',
          'email' => 'test@test.com'
      ]);
      $this->assertTrue($user1->name != $user2->name);
    }
}
