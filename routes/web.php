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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function(){
    return view('pages.index');
});*/
Route::get('/','PagesController@index'); 
Route::get('/about','PagesController@about'); 
Route::get('/services','PagesController@services');
Route::get('/devops', 'DataController@devops');
Route::get('/readData', 'DataController@readData');
Route::get('/add', function(){return view('pages.add');});
Route::post('/insert','DataController@insert');
Route::get('/update/{id}','DataController@update');
Route::post('/edit/{id}','DataController@edit');
Route::get('/delete/{id}','DataController@delete');
Route::resource('posts','PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
