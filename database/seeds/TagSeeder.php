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
            'class' => 'primary'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'complete',
            'class' => 'success'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'in progress',
            'class' => 'warning'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'paid',
            'class' => 'info'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'bid',
            'class' => 'secondary'
        ));

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'important',
            'class' => 'success'
        ));

        // 7
        DB::table('tags')->insert(array(
            'category' => 'labour',
            'name' => 'floor',
            'class' => 'dark'
        ));

        DB::table('tags')->insert(array(
            'category' => 'labour',
            'name' => 'wall',
            'class' => 'light'
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

        DB::table('tags')->insert(array(
            'category' => 'status',
            'name' => 'kitchen',
            'default' => false,
            'class' => 'warning'
        ));

    }

}
