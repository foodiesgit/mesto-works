<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class SituationSeeder extends Seeder
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
            'type_id' => 1,
            'name' => 'Onay Bekleniyor',
            'class_name' => 'warning',
            'hex_color_code' => 'FFA800',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 2,
            'type_id' => 1,
            'name' => 'Onaylandı',
            'class_name' => 'info',
            'hex_color_code' => '3699FF',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 3,
            'type_id' => 1,
            'name' => 'Yayınlandı',
            'class_name' => 'success',
            'hex_color_code' => '1BC5BD',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 4,
            'type_id' => 1,
            'name' => 'Yayınlanmadı',
            'class_name' => 'danger',
            'hex_color_code' => 'F64E60',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 5,
            'type_id' => 2,
            'name' => 'Onay Bekleniyor',
            'class_name' => 'warning',
            'hex_color_code' => 'FFA800',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 6,
            'type_id' => 2,
            'name' => 'Onaylandı',
            'class_name' => 'info',
            'hex_color_code' => '3699FF',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 7,
            'type_id' => 2,
            'name' => 'Yayınlandı',
            'class_name' => 'success',
            'hex_color_code' => '1BC5BD',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 8,
            'type_id' => 2,
            'name' => 'Yayınlanmadı',
            'class_name' => 'danger',
            'hex_color_code' => 'F64E60',
            'is_deletable' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]];

        DB::table('situations')->insert($items);
    }
}
