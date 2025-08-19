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
            'slug' => 'laravel'
        ]);

        Category::create([
            'name' => 'PHP',
            'slug' => 'php'
        ]);

        Category::create([
            'name' => 'Python',
            'slug' => 'python'
        ]);

        Category::create([
            'name' => 'FastAPI',
            'slug' => 'fastapi'
        ]);

        Category::create([
            'name' => 'Restfull API',
            'slug' => 'restfull-api'
        ]);

        Category::create([
            'name' => 'Javascript',
            'slug' => 'javascript'
        ]);
    }
}
