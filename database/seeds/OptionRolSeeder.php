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
            'name' => 'project',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '1',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'project',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '2',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'project',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '3',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'project',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '4',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'card',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '5',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'card',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '6',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'card',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '7',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'card',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '8',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'card',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '9',
        ));

        DB::table('options_rols')->insert(array(
            'name' => 'project',
            'description' => 'admin',
            'active' => true,
            'rol_id' => '2',
            'option_id' => '10',
        ));
    }
}