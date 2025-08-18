<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data=["title" => "Home Page"];
    return view('home', $data);
});

Route::get('/about', function () {
    $data = ["title" => "About Page","name" => "Mohammad Vicky Agassi"];
    return view('about', $data);
});

Route::get('/blog', function () {
    $data = ["title" => "Blog Page"];
    return view('blog', $data);
});

Route::get('/contact', function () {
    $data = [
        "title" => "Contact Page",
        "name" => "Mohammad Vicky Agassi",
        "email" => "z0a9u@example.com",
        "phone" => "08123456789",
        "social_media" => "https://github.com/MohammadVickyAgassi"
    ];
    return view('contact', $data);
});
