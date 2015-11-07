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



Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
