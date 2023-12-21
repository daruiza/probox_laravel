<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeneralListsSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(CommerceSeeder::class);
        $this->call(UserSeeder::class);        
        $this->call(ModuleSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(OptionRolSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(NoteSeeder::class);        
        $this->call(CustomerSeeder::class);
        $this->call(ColaboratorSeeder::class);                
        $this->call(TaskSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ProjectTagSeeder::class);        
        $this->call(EvidenceSeeder::class);
    }
}
