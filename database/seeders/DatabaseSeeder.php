<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\Profile::factory()->create([
            'id' => 1,
            'name' => 'Practicante'

        ]);
        \App\Models\Profile::factory()->create([
            'id' => 2,
            'name' => 'Desarrollador'
        ]);
        \App\Models\Profile::factory()->create([
            'id' => 3,
            'name' => 'Vendedor'
        ]);\App\Models\Profile::factory()->create([
            'id' => 4,
            'name' => 'Administrador'
        ]);
         \App\Models\User::factory(20)->create();


    }
}
