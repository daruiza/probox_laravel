<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert(
            array(
                'name' => 'name1',
                'file' => 'file1',
                'description' => 'description1',
                'project_id' => 1
            )
        );

        DB::table('documents')->insert(
            array(
                'name' => 'name2',
                'file' => 'file2',
                'description' => 'description2',
                'project_id' => 1
            )
        );
    }
}
