<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_lists')->insert(array(
            'name' => 'theme',
            'value' => 'blue-grey-theme'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'theme',
            'value' => 'indigo-theme'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'theme',
            'value' => 'light-blue-theme'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'activityrol',
            'value' => 'workman'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'activityrol',
            'value' => 'plumer'
        ));
    }
}