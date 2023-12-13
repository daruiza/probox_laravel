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
                'name' => 'LMP',
                'logo' => 'lmp.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'DMG',
                'logo' => 'dmg.png',
            )
        );
    }
}
