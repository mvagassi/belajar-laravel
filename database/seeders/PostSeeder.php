<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'First Post',
            'slug' => 'first-post',
            'body' => 'This is my first post',
            'category_id' => 1,
            'author_id' => 1
        ]);
    }
}
