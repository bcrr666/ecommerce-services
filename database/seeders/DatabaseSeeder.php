<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        \App\Models\User::factory(10)->create();
        
        \App\Models\Course::factory()->create([
            'name' => 'Javascript',
            'img' => '/course/cursos-de-JavaScript.jpg',
            'author' => 'Juan Perez',
            'resume' => 'Es un curso importante para el manejo de javascript',
        ]);

        \App\Models\Course::factory()->create([
            'name' => 'Node js',
            'img' => '/course/cursos-de-JavaScript.jpg',
            'author' => 'Juan Perez',
            'resume' => 'Es un curso importante para el manejo de javascript',
        ]);

        \App\Models\Lesson::factory(10)->create();
        \App\Models\Enrollment::factory(10)->create();
    }
}
