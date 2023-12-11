<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaborators')->insert(
            array(
                'activity_rol' => 'painter',
                'date_start' => '2023-12-11',
                'date_departure' => '2023-12-13',
                'recommended' => null,
                'boss_name' => 'Tiven',
                'user_id' => 2,
                'project_id' => 1,
            )
        );

        DB::table('colaborators')->insert(
            array(
                'activity_rol' => 'sculptor',
                'date_start' => '2023-12-11',
                'date_departure' => '2023-12-13',
                'recommended' => null,
                'boss_name' => 'Tiven',
                'user_id' => 2,
                'project_id' => 2,
            )
        );

       
    }
}
