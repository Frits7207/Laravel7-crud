<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware' => ['role:Admin|Student']], function(){ 
    Route::get('tasks/{task}/delete', 'TaskController@delete')
        ->name('tasks.delete');
Route::resource('/tasks', 'TaskController');
Route::post('/create', 'TaskController@store')->name('tasks.store');
Route::get('/create', 'TaskController@create')->name('tasks.create');
});


Route::get('/home', 'HomeController@index')->name('home');
