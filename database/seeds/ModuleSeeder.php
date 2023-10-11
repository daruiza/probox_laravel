<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert(array(
            'name' => 'Projects',
            'description' => 'project objectives',
            'label' => 'PPP',
        ));

        DB::table('modules')->insert(array(
            'name' => 'Projects_2',
            'description' => 'project objectives_2',
            'label' => 'PPP_2',
        ));

    }
}
