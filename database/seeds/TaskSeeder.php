<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(array(
            'name' => 'task 1',
            'description' => 'description 1',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'focus' => true,
            'project_id' => '1',
        ));

        DB::table('tasks')->insert(array(
            'name' => 'task 2',
            'description' => 'description 2',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'focus' => true,
            'project_id' => '2',
        ));

        DB::table('tasks')->insert(array(
            'name' => 'task 3',
            'description' => 'description 3',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'focus' => true,
            'project_id' => '1',
        ));

    }

}
