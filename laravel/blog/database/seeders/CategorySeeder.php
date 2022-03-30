<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = ['Sport','Education','Life'];
        foreach ($data as $item) {
            DB::table('categories')->insert([
               "name" => $item,
               "slug" => Str::slug($item),
               "created_at" => now(),
               "updated_at" => now()
            ]);
        }
    }
}
