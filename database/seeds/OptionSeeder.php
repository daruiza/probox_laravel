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

        DB::table('options')->insert(array(
            'name' => 'store',
            'description' => 'store of the project',
            'label' => 'store',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'show',
            'description' => 'show of the project',
            'label' => 'show',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'edit',
            'description' => 'edit of the project',
            'label' => 'edit',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'delete',
            'description' => 'delete of the project',
            'label' => 'delete',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'tasks',
            'description' => 'task of the project',
            'label' => 'task',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'documents',
            'description' => 'documents of the project',
            'label' => 'documents',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'customers',
            'description' => 'customers of the project',
            'label' => 'customers',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'colaboratos',
            'description' => 'colaboratos of the project',
            'label' => 'colaboratos',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'notes',
            'description' => 'notes of the project',
            'label' => 'notes',
            'module_id' => '1',
        ));

        DB::table('options')->insert(array(
            'name' => 'tags',
            'description' => 'tags of the project',
            'label' => 'tags',
            'module_id' => '1',
        ));
    }
}
