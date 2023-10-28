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
            'rol_id' => '1',
            'option_id' => '1',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_2',
            'description' => 'Option_rol_2',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '2',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_3',
            'description' => 'Option_rol_3',
            'active' => false,
            'rol_id' => '3',
            'option_id' => '2',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'Option_rol_4',
            'description' => 'Option_rol_4',
            'active' => false,
            'rol_id' => '1',
            'option_id' => '3',
        ));

    }
}