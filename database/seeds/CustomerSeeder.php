<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(
            array(
                'user_id' => 2,
                'project_id' => 1,
            )
        );

        DB::table('customers')->insert(
            array(
                'user_id' => 2,
                'project_id' => 2,
            )
        );

       
    }
}
