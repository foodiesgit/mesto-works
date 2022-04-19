<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    //create the user if its not exists
    public function test_check_has_user()
    {
        $user = User::create([
            'name' => 'test3',
            'email' => 'test3@outlook.com',
            'password' => bcrypt('9090')
        ]);
        $this->assertEquals('test3@outlook.com', $user->email);
    }
}
