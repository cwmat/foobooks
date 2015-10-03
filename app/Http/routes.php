<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', function () {
    return 'List dem books!';
});

Route::get('/books/show/{title}', function ($title) {
    return "Here's a thing!" . $title;
});

Route::get('/books/create', function () {
    $view = '<form method="POST" action="/books/create">';
    $view .= csrf_field();
    $view .= '<input type="text" name="title">';
    $view .= '<input type="submit">';
    $view .= '</form>';

    return $view;
});

Route::post('/books/create', function () {
    return 'Process to create a new book' . $_POST['title'];
});
