<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // PROJECTS
        // option 1
        DB::table('options')->insert(array(
            'name' => 'store',
            'description' => 'store of the project',
            'label' => 'store',
            'icon' => 'add_circle',
            'module_id' => '1',
        ));

        // option 2
        DB::table('options')->insert(array(
            'name' => 'show',
            'description' => 'show of the project',
            'label' => 'show',
            'icon' => 'visibility',
            'module_id' => '1',
        ));

        // option 3
        DB::table('options')->insert(array(
            'name' => 'edit',
            'description' => 'edit of the project',
            'label' => 'edit',
            'icon' => 'settings',
            'module_id' => '1',
        ));

        // option 4
        DB::table('options')->insert(array(
            'name' => 'delete',
            'description' => 'delete of the project',
            'label' => 'delete',
            'icon' => 'delete',
            'module_id' => '1',
        ));

        // option 5
        DB::table('options')->insert(array(
            'name' => 'tasks',
            'description' => 'task of the project',
            'label' => 'task',
            'icon' => 'assignment',
            'module_id' => '1',
        ));

        // option 6
        DB::table('options')->insert(array(
            'name' => 'documents',
            'description' => 'documents of the project',
            'label' => 'documents',
            'icon' => 'description',
            'module_id' => '1',
        ));

        // option 7
        DB::table('options')->insert(array(
            'name' => 'customers',
            'description' => 'customers of the project',
            'label' => 'customers',
            'icon' => 'assignment_ind',
            'module_id' => '1',
        ));

        // option 8
        DB::table('options')->insert(array(
            'name' => 'colaboratos',
            'description' => 'colaboratos of the project',
            'label' => 'colaboratos',
            'icon' => 'build',
            'module_id' => '1',
        ));

        // option 9
        DB::table('options')->insert(array(
            'name' => 'notes',
            'description' => 'notes of the project',
            'label' => 'notes',
            'icon' => 'event_note',
            'module_id' => '1',
        ));

        // option 10
        DB::table('options')->insert(array(
            'name' => 'tags',
            'description' => 'tags of the project',
            'label' => 'tags',
            'icon' => 'local_offer',
            'module_id' => '1',
        ));

        // option 11
        DB::table('options')->insert(array(
            'name' => 'edit_map',
            'description' => 'edit map of the card project',
            'label' => 'edit_map',
            'icon' => 'map',
            'module_id' => '1',
        ));

        // option 12
        DB::table('options')->insert(array(
            'name' => 'projecs',
            'description' => 'projects of the commerce',
            'label' => 'projects',
            'icon' => 'work',
            'module_id' => '1',
        ));
    }
}
