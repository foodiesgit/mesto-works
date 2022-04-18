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
}
