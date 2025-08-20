<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(5)->create();

        Category::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'color' => 'red',
        ]);

        Category::create([
            'name' => 'PHP',
            'slug' => 'php',
            'color' => 'stone',
        ]);

        Category::create([
            'name' => 'Python',
            'slug' => 'python',
            'color' => 'violet',
        ]);

        Category::create([
            'name' => 'FastAPI',
            'slug' => 'fastapi',
            'color' => 'yellow',
        ]);

        Category::create([
            'name' => 'Restfull API',
            'slug' => 'restfull-api',
            'color' => 'blue',
        ]);

        Category::create([
            'name' => 'Javascript',
            'slug' => 'javascript',
            'color' => 'green',
        ]);
    }
}
