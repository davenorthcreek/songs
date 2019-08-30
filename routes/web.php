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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController');
    Route::post('/user_update/{id}', 'UserController@update');
    Route::get('/delete_user/{id}', 'UserController@destroy');



    Route::resource('services', 'ServiceController');
    Route::resource('playlists', 'PlaylistController');
    Route::resource('musicians', 'MusicianController');
    Route::group([
        'prefix' => 'song',
    ], function () {
        Route::get('/', 'SongsController@index')
        ->name('songs.song.index');
        Route::get('/create','SongsController@create')
        ->name('songs.song.create');
        Route::get('/show/{song}','SongsController@show')
        ->name('songs.song.show')->where('id', '[0-9]+');
        Route::get('/{song}/edit','SongsController@edit')
        ->name('songs.song.edit')->where('id', '[0-9]+');
        Route::post('/', 'SongsController@store')
        ->name('songs.song.store');
        Route::put('song/{song}', 'SongsController@update')
        ->name('songs.song.update')->where('id', '[0-9]+');
        Route::delete('/song/{song}','SongsController@destroy')
        ->name('songs.song.destroy')->where('id', '[0-9]+');
    });


    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
