<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About Page",
        "name" => "Mohammad Vicky Agassi"
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        "title" => "Blog Page",
        "posts" => Post::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', [
        "title" => "Single Post",
        "post" => $post
    ]);
});

Route::get('/authors/{user:username}', function (User $user) {

    return view('posts', [
        "title" => count($user->posts) . " Articles by " . $user->name,
        "posts" => $user->posts
    ]);
});

Route::get('/post-categories/{category:slug}', function (Category $category) {

    return view('posts', [
        "title" => " Articles in " . $category->name,
        "posts" => $category->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact Page",
        "name" => "Mohammad Vicky Agassi",
        "email" => "z0a9u@example.com",
        "phone" => "08123456789",
        "social_media" => "https://github.com/MohammadVickyAgassi"
    ]);
});
