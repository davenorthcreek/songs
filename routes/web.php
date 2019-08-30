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

Route::group([
    'prefix' => 'services',
], function () {
    Route::get('/', 'ServiceController@index')
         ->name('services.service.index');
    Route::get('/create','ServiceController@create')
         ->name('services.service.create');
    Route::get('/show/{service}','ServiceController@show')
         ->name('services.service.show')->where('id', '[0-9]+');
    Route::get('/{service}/edit','ServiceController@edit')
         ->name('services.service.edit')->where('id', '[0-9]+');
    Route::post('/', 'ServiceController@store')
         ->name('services.service.store');
    Route::put('service/{service}', 'ServiceController@update')
         ->name('services.service.update')->where('id', '[0-9]+');
    Route::delete('/service/{service}','ServiceController@destroy')
         ->name('services.service.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'playlists',
], function () {
    Route::get('/', 'PlaylistController@index')
         ->name('playlists.playlist.index');
    Route::get('/create','PlaylistController@create')
         ->name('playlists.playlist.create');
    Route::get('/show/{playlist}','PlaylistController@show')
         ->name('playlists.playlist.show')->where('id', '[0-9]+');
    Route::get('/{playlist}/edit','PlaylistController@edit')
         ->name('playlists.playlist.edit')->where('id', '[0-9]+');
    Route::post('/', 'PlaylistController@store')
         ->name('playlists.playlist.store');
    Route::put('playlist/{playlist}', 'PlaylistController@update')
         ->name('playlists.playlist.update')->where('id', '[0-9]+');
    Route::delete('/playlist/{playlist}','PlaylistController@destroy')
         ->name('playlists.playlist.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'musicians',
], function () {
    Route::get('/', 'MusicianController@index')
         ->name('musicians.musician.index');
    Route::get('/create','MusicianController@create')
         ->name('musicians.musician.create');
    Route::get('/show/{musician}','MusicianController@show')
         ->name('musicians.musician.show')->where('id', '[0-9]+');
    Route::get('/{musician}/edit','MusicianController@edit')
         ->name('musicians.musician.edit')->where('id', '[0-9]+');
    Route::post('/', 'MusicianController@store')
         ->name('musicians.musician.store');
    Route::put('musician/{musician}', 'MusicianController@update')
         ->name('musicians.musician.update')->where('id', '[0-9]+');
    Route::delete('/musician/{musician}','MusicianController@destroy')
         ->name('musicians.musician.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'charts',
], function () {
    Route::get('/', 'ChartController@index')
         ->name('charts.chart.index');
    Route::get('/create','ChartController@create')
         ->name('charts.chart.create');
    Route::get('/show/{chart}','ChartController@show')
         ->name('charts.chart.show')->where('id', '[0-9]+');
    Route::get('/{chart}/edit','ChartController@edit')
         ->name('charts.chart.edit')->where('id', '[0-9]+');
    Route::post('/', 'ChartController@store')
         ->name('charts.chart.store');
    Route::put('chart/{chart}', 'ChartController@update')
         ->name('charts.chart.update')->where('id', '[0-9]+');
    Route::delete('/chart/{chart}','ChartController@destroy')
         ->name('charts.chart.destroy')->where('id', '[0-9]+');
});
