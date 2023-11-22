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
            'price' => '10000',
            'date_init' => '1998-02-05',
            'date_closed' => '1999-10-12',
            'address' => 'Cll3#2145',
            'quotation' => 'quotation CO',
            'goal' => 'goal CO',
            'photo' => 'photo CO',
            'description' => 'project Colombia',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects VE',
            'price' => '70000',
            'date_init' => '2010-01-01',
            'date_closed' => '2012-01-01',
            'address' => 'Calle34#2-34',
            'quotation' => 'quotation VE',
            'goal' => 'goal VE',
            'photo' => 'photo VE',
            'description' => 'project Venezuela',
            'focus' => true,
            'active' => true,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects ES',
            'price' => '80000',
            'date_init' => '2005-01-01',
            'date_closed' => '2006-01-01',
            'address' => 'address ES',
            'quotation' => 'quotation ES',
            'goal' => 'goal ES',
            'photo' => 'photo ES',
            'description' => 'project España',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects AR',
            'price' => '20000',
            'date_init' => '2007-01-01',
            'date_closed' => '2009-01-01',
            'address' => 'address AR',
            'quotation' => 'quotation AR',
            'goal' => 'goal AR',
            'photo' => 'photo AR',
            'description' => 'project Argentina',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects CO2',
            'price' => '10000',
            'date_init' => '2001-11-01',
            'date_closed' => '2002-01-01',
            'address' => 'Cll3#2145',
            'quotation' => 'quotation CO',
            'goal' => 'goal CO',
            'photo' => 'photo CO',
            'description' => 'project Colombia',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects VE2',
            'price' => '70000',
            'date_init' => '2010-01-01',
            'date_closed' => '2012-01-01',
            'address' => 'Calle34#2-34',
            'quotation' => 'quotation VE',
            'goal' => 'goal VE',
            'photo' => 'photo VE',
            'description' => 'project Venezuela',
            'focus' => true,
            'active' => true,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects ES2',
            'price' => '80000',
            'date_init' => '2005-01-01',
            'date_closed' => '2006-01-01',
            'address' => 'address ES',
            'quotation' => 'quotation ES',
            'goal' => 'goal ES',
            'photo' => 'photo ES',
            'description' => 'project España',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects AR2',
            'price' => '20000',
            'date_init' => '2007-01-01',
            'date_closed' => '2009-01-01',
            'address' => 'address AR',
            'quotation' => 'quotation AR',
            'goal' => 'goal AR',
            'photo' => 'photo AR',
            'description' => 'project Argentina',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects CO3',
            'price' => '10000',
            'date_init' => '2021-05-25',
            'date_closed' => '2021-10-01',
            'address' => 'Cll3#2145',
            'quotation' => 'quotation CO',
            'goal' => 'goal CO',
            'photo' => 'photo CO',
            'description' => 'project Colombia',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects VE3',
            'price' => '70000',
            'date_init' => '2010-01-01',
            'date_closed' => '2012-01-01',
            'address' => 'Calle34#2-34',
            'quotation' => 'quotation VE',
            'goal' => 'goal VE',
            'photo' => 'photo VE',
            'description' => 'project Venezuela',
            'focus' => true,
            'active' => true,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects ES3',
            'price' => '80000',
            'date_init' => '2005-01-01',
            'date_closed' => '2006-01-01',
            'address' => 'address ES',
            'quotation' => 'quotation ES',
            'goal' => 'goal ES',
            'photo' => 'photo ES',
            'description' => 'project España',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects AR3',
            'price' => '20000',
            'date_init' => '2007-01-01',
            'date_closed' => '2009-01-01',
            'address' => 'address AR',
            'quotation' => 'quotation AR',
            'goal' => 'goal AR',
            'photo' => 'photo AR',
            'description' => 'project Argentina',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects CO4',
            'price' => '10000',
            'date_init' => '2000-01-01',
            'date_closed' => '2002-01-01',
            'address' => 'Cll3#2145',
            'quotation' => 'quotation CO',
            'goal' => 'goal CO',
            'photo' => 'photo CO',
            'description' => 'project Colombia',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects VE4',
            'price' => '70000',
            'date_init' => '2010-01-01',
            'date_closed' => '2012-01-01',
            'address' => 'Calle34#2-34',
            'quotation' => 'quotation VE',
            'goal' => 'goal VE',
            'photo' => 'photo VE',
            'description' => 'project Venezuela',
            'focus' => true,
            'active' => true,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects ES4',
            'price' => '80000',
            'date_init' => '2022-04-01',
            'date_closed' => '2024-10-05',
            'address' => 'address ES',
            'quotation' => 'quotation ES',
            'goal' => 'goal ES',
            'photo' => 'photo ES',
            'description' => 'project España',
            'focus' => true,
            'active' => false,
        ));

        DB::table('projects')->insert(array(
            'name' => 'Projects AR4',
            'price' => '20000',
            'date_init' => '2007-01-01',
            'date_closed' => '2009-01-01',
            'address' => 'address AR',
            'quotation' => 'quotation AR',
            'goal' => 'goal AR',
            'photo' => 'photo AR',
            'description' => 'project Argentina',
            'focus' => true,
            'active' => false,
        ));



    }
}
