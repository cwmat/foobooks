<?php

// use Rych\Random\Random;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/books', function () {
//     return 'List dem books!';
// });
//
// Route::get('/books/show/{title}', function ($title) {
//     return "Here's a thing!" . $title;
// });
//
// Route::get('/books/create', function () {
//     $view = '<form method="POST" action="/books/create">';
//     $view .= csrf_field();
//     $view .= '<input type="text" name="title">';
//     $view .= '<input type="submit">';
//     $view .= '</form>';
//
//     return $view;
// });
//
// Route::post('/books/create', function () {
//     return 'Process to create a new book' . $_POST['title'];
// });

// get, post, put, delete
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/books', 'BookController@getIndex');
// Route::get('/books/show/{title}', 'BookController@getShow');
// Route::get('/books/create', 'BookController@getCreate');
// Route::post('/books/create', 'BookController@postCreate');
#Route::get('/books/foo', 'BookController@bar');
Route::controller('/books','BookController');
Route::get('/practice', function() {
    echo config('app.debug');
});

// Tag RESTful
// Explicit
// Route::get('/tag', 'TagController@index');
// Route::get('/tag/create', 'TagController@create');
// Route::post('/tag', 'TagController@store');
// Route::get('/tag/{tag_id}', 'TagController@show');
// Route::get('/tag/{tag_id}/edit', 'TagController@edit');
// Route::put('/tag/{tag_id}', 'TagController@update');
// Route::delete('/tag/{tag_id}', 'TagController@destroy');

// Implicit
Route::resource('tag', 'TagController');







// testing
Route::get('/practice', function() {
  Debugbar::info(Array('foo' => 'bar'));
  Debugbar::error('Error!');
  Debugbar::warning('Watch out…');
  Debugbar::addMessage('Another message', 'mylabel');


  $random = new Random();

  // Generate a 16-byte string of random raw data
  $randomBytes = $random->getRandomString(16);
  return $randomBytes;



  return 'Practice';
});

// Logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
