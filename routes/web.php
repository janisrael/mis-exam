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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'offices'], function () {
    Route::get('/', 'Crud3Controller@index');
    Route::match(['get', 'post'], 'create', 'Crud3Controller@create');
    Route::match(['get', 'put'], 'update/{id}', 'Crud3Controller@update');
    Route::delete('delete/{id}', 'Crud3Controller@delete');
});
Auth::routes();

Route::get('/offices', 'Crud3Controller@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');