<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EvidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evidences')->insert(array(
            'name' => 'evidence 1',
            'file' => '/storage/images/obra001.jpg',
            'type' => 'type 1',
            'description' => 'description 1',
            'approved' => true,
            'focus' => false,
            'task_id' => '3',
        ));

        DB::table('evidences')->insert(array(
            'name' => 'evidnece 2',
            'file' => '/storage/images/obra002.jpeg',
            'type' => 'type 2',
            'description' => 'description 2',
            'approved' => true,
            'focus' => false,
            'task_id' => '2',
        ));

        DB::table('evidences')->insert(array(
            'name' => 'evidnece 3',
            'file' => '/storage/images/obra003.jpg',
            'type' => 'type 3',
            'description' => 'description 3',
            'approved' => true,
            'focus' => false,
            'task_id' => '1',
        ));

        DB::table('evidences')->insert(array(
            'name' => 'evidence 4',
            'file' => '/storage/images/obra004.jpg',
            'type' => 'type 4',
            'description' => 'description 4',
            'approved' => true,
            'focus' => false,
            'task_id' => '2',
        ));

        DB::table('evidences')->insert(array(
            'name' => 'evidence 5',
            'file' => '/storage/images/obra005.jpg',
            'type' => 'type 5',
            'description' => 'description 5',
            'approved' => true,
            'focus' => false,
            'task_id' => '1',
        ));

    }
}
