<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects_tags')->insert(array(
            'project_id' => 1,
            'tag_id' => 1,
        ));

        DB::table('projects_tags')->insert(array(
            'project_id' => 1,
            'tag_id' => 2,
        ));

        DB::table('projects_tags')->insert(array(
            'project_id' => 1,
            'tag_id' => 3,
        ));

        
    }

}
