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

Route::get('login',[
    'uses' => 'Auth\LoginController@index',
    'as' => 'showLogin'
]);
Route::get('/getuser','Auth\LoginController@getUser');

Route::post('login',[
    'uses' => 'Auth\LoginController@login',
    'as' => 'log_in'
]);

Route::get('profile',[
    'uses' => 'Auth\LoginController@showProfile',
    'as' => 'showProfile'
])->middleware('authUser');
