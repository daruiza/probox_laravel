<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert(
            array(
                'description' => 'note1',
                'project_id' => 1
            )
        );
        
        DB::table('notes')->insert(
            array(
                'description' => 'note3',
                'project_id' => 1
            )
        );

        DB::table('notes')->insert(
            array(
                'description' => 'note2',
                'project_id' => 1
            )
        );
    }
}
