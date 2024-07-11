<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Matricula;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Abel Arana',
            'email' => 'abel.arana@hotmail.com',
            'password' => bcrypt('lobomalo123'),
        ]);
        Alumno::factory(400)->create();
        Curso::factory(10)->create();
        Matricula::factory(200)->create();
    }
}
