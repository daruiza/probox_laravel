<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert(array(
            'name' => 'Option1',
            'description' => 'Description Option1',
            'label' => 'OP1',
            'id_module' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'Option2',
            'description' => 'Description Option2',
            'label' => 'OP2',
            'id_module' => '2',
        ));

        DB::table('options')->insert(array(
            'name' => 'Option3',
            'description' => 'Description Option3',
            'label' => 'OP3',
            'id_module' => '2',
        ));

    }
}