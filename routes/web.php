<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', function () {

    $data1 = "About us - Online Store";

    $data2 = "About us";

    $description = "This is an about page ...";

    $author = "Developed by: Jamusito";

    return view('home.about')->with("title", $data1)

        ->with("subtitle", $data2)

        ->with("description", $description)

        ->with("author", $author);
})->name("home.about");

Route::get('/contact', function () {

    $data1 = "Contact - Online Store";

    $data2 = "Contact";

    $author = "Samuel Martínez";

    $email = "jamu@gmail.com";

    $cellphone = "3042314478";

    return view('home.contact')->with("title", $data1)

        ->with("subtitle", $data2)

        ->with("email", $email)

        ->with("cellphone", $cellphone)

        ->with("author", $author);
})->name("home.contact");

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save"); 
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");