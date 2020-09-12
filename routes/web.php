<?php

Route::get('/', function () {
    return view('index');
});
Route::get('/quiz', function () {
    return view('quiz.index');
});
Route::get('/login', function () {
    return view('auth.login.index');
});
Route::get('/register', function () {
    return view('auth.register.index');
});
Route::post('/register', 'Auth\RegisterController@register');
