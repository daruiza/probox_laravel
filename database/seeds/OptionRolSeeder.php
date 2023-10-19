<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OptionRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_1',
            'description' => 'Option_rol_1',
            'active' => true,
            'id_rol' => '1',
            'id_option' => '1',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_2',
            'description' => 'Option_rol_2',
            'active' => true,
            'id_rol' => '2',
            'id_option' => '2',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_3',
            'description' => 'Option_rol_3',
            'active' => false,
            'id_rol' => '3',
            'id_option' => '2',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_4',
            'description' => 'Option_rol_4',
            'active' => false,
            'id_rol' => '1',
            'id_option' => '3',
        ));

    }
}