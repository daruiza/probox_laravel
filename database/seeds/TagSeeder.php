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
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'complete',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'in progress',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'paid',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'bid',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'important',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'labour',
            'name' => 'floor',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'labour',
            'name' => 'wall',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'labour',
            'name' => 'roof',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'labour',
            'name' => 'wood',
            'class' => 'warning'
        ));

    }

}
