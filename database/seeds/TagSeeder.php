<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'active',
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'complete',
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'in progress',
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'paid',
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'bid',
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'important',
        ));

    }

}
