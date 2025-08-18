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
            [
                "title" => "Judul Post Pertama",
                "slug" => "judul-post-pertama",
                "author" => "Mohammad Vicky Agassi",
                "created_at" => "2022-01-01 08:30:21",
                "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, repudiandae! Soluta vel,
                                magni ad commodi illo placeat incidunt, non quasi, sed totam dolores dolorum atque.
                                Exercitationem reiciendis quisquam perferendis ducimus.",
                "user_id" => 1
            ],
            [
                "title" => "Judul Post Kedua",
                "slug" => "judul-post-kedua",
                "author" => "Mohammad Vicky Agassi",
                "created_at" => "2022-02-01 16:00:00",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quo,
                                libero blanditiis cupiditate distinctio autem.
                                Consequatur eum, vitae, sit omnis non et placeat repudiandae,
                                doloribus iste tenetur unde fugit ipsam.",
                "user_id" => 1
            ]
        ]);
    }
}
