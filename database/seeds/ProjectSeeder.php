<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(array(
            'name' => 'Projects CO',
            'price' => '0000',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'address' => 'address CO',
            'quotion' => 'quotion CO',
            'goal' => 'goal CO',
            'photo' => 'photo CO',
            'description' => 'project Colombia',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects VE',
            'price' => '0000',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'address' => 'address VE',
            'quotion' => 'quotion VE',
            'goal' => 'goal VE',
            'photo' => 'photo VE',
            'description' => 'project Venezuela',
            'focus' => true,
            'active' => true,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects ES',
            'price' => '0000',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'address' => 'address ES',
            'quotion' => 'quotion ES',
            'goal' => 'goal ES',
            'photo' => 'photo ES',
            'description' => 'project España',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects AR',
            'price' => '0000',
            'date_init' => '2000-01-01',
            'date_closed' => '2000-01-01',
            'address' => 'address AR',
            'quotion' => 'quotion AR',
            'goal' => 'goal AR',
            'photo' => 'photo AR',
            'description' => 'project Argentina',
            'focus' => true,
            'active' => false,
        ));

    }
}
