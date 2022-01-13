<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [[
            'id' => 1,
            'name' => 'Merve Erbilici',
            'tc' => '111',
            'email' => 'merveerbilici@gaziantepbilisim.com.tr',
            'password' => Hash::make('hellö'),
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 2,
            'name' => 'İsmail Ünal',
            'tc' => '333',
            'email' => 'ismailunal@gaziantepbilisim.com.tr',
            'password' => Hash::make('hellö'),
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]];

        DB::table('users')->insert($items);
    }
}
