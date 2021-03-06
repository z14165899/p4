<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'P4Controller@index');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/manage', 'P4Controller@manage');

    #Make an Appointment
    Route::get('/appointment', 'P4Controller@appointment');
    Route::post('/reservations', 'P4Controller@reserve');

    #View a Course
    Route::get('/course/{id}', 'P4Controller@show');

    #Edit an Appiontment
    Route::get('/reservation/{id}/edit', 'P4Controller@edit');
    Route::put('/reservation/{id}', 'P4Controller@update');

    #Edit a Course
    Route::get('/course/{id}/edit', 'P4Controller@change');
    Route::put('/course/{id}', 'P4Controller@modify');

    # Delete an Appointment
    Route::get('/reservation/{id}/delete', 'P4Controller@delete');
    Route::delete('/reservation/{id}', 'P4Controller@remove');

    Route::get('/reservations', 'P4Controller@reservations');
});

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});

Route::get('/env', function () {
    dump(config('app.name'));
    dump(config('app.env'));
    dump(config('app.debug'));
    dump(config('app.url'));
});

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Auth::routes();

