<?php

namespace Database\Seeders;

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
        \App\Models\Especialidad::factory(5)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Medico::factory(10)->create();
        \App\Models\Cita::factory(30)->create();
        \App\Models\Receta::factory(30)->create();
    }
}
