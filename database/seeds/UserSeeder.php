<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'name' => 'super-admin',
            'lastname' => 'super',
            'phone' => '3194065226',
            'email' => 'super@mail.com',
            'password' => Hash::make('0000'),
            'theme' => 'super',
            'photo' => null,
            'rol_id' => '1',
            'chexk_digit' => '3',
            'nacionality' => 'Venezolano',
            'birthdate' => '2002-10-12',
            'active' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'cliente',
            'lastname' => 'super',
            'phone' => '3164056225',
            'email' => 'cliente@mail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '2',
            'chexk_digit' => '3',
            'nacionality' => 'Venezolano',
            'birthdate' => '2002-10-12',
            'active' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'Luis',
            'lastname' => 'super',
            'phone' => '3124567891',
            'email' => 'luis@mail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '3',
            'chexk_digit' => '3',
            'nacionality' => 'Venezolano',
            'birthdate' => '2002-10-12',
            'active' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'David',
            'lastname' => 'AGT002',
            'phone' => '3124567891',
            'email' => 'david@mail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '3',
            'chexk_digit' => '3',
            'nacionality' => 'Venezolano',
            'birthdate' => '2002-10-12',
            'active' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'Stiven',
            'lastname' => 'super2',
            'phone' => '3107894561',
            'email' => 'stiven@mail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '2',
            'chexk_digit' => '3',
            'nacionality' => 'Venezolano',
            'birthdate' => '2002-10-12',
            'active' => '1',
        ));
    }
}
