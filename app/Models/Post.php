<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                "title" => "Judul Post Pertama",
                "slug" => "judul-post-pertama",
                "author" => "Mohammad Vicky Agassi",
                "created_at" => "2022-01-01 08:30:21",
                "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, repudiandae! Soluta vel,
                                magni ad commodi illo placeat incidunt, non quasi, sed totam dolores dolorum atque.
                                Exercitationem reiciendis quisquam perferendis ducimus."
            ],
            [
                "title" => "Judul Post Kedua",
                "slug" => "judul-post-kedua",
                "author" => "Mohammad Vicky Agassi",
                "created_at" => "2022-02-01 16:00:00",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quo,
                                libero blanditiis cupiditate distinctio autem.
                                Consequatur eum, vitae, sit omnis non et placeat repudiandae,
                                doloribus iste tenetur unde fugit ipsam."
            ]
        ];
    }

    public static function find($slug): array
    {
        $posts = static::all();

        // $post = Arr::first($posts, function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        //using arrow function
        $post = Arr::first($posts, fn ($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
