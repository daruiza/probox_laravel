<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commerces')->insert(
            array(
                'name' => 'probox',
                'phone' => '+17206950292',
                'logo' => 'probox.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'dmg',
                'phone' => '+57319406250',
                'logo' => 'dmg.png',
            )
        );
    }
}
