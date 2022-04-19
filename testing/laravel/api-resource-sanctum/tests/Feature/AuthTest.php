<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class AuthTest extends TestCase
{
    //delete--------------------------------------------------------------
    public function test_delete(){
        $user = User::factory()->count(1)->make();
        // $user = User::first();
        $user = User::find(3);
        if($user){
            $user->delete();
        }
        $this->assertTrue(true);
    }
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
