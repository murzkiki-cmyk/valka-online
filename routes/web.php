<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/ranking', function () {
    return view('ranking');
});

Route::get('/guide', function () {
    return view('guide');
});

Route::get('/contact', function () {
    return view('contact');
});
