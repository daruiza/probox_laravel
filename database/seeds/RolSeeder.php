<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert(
            array(
                'name' => 'super',
                'description' => 'super',
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'admin',
                'description' => 'admin',
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'customer',
                'description' => 'customer',
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'colaborator',
                'description' => 'colaborator',
            )
        );
    }
}
