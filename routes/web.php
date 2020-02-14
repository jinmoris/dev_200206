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

//Route::get('/admin','AdminController@login');
Route::match(['get', 'post'], '/admin','AdminController@login');
Route::get('/admin/logout','AdminController@logout');

//redirectIfAuthenticated.php
Route::group(['middleware' => ['auth']],function(){
    
    //Dashboard (Admin)
    Route::get('/admin/dashboard','AdminController@dashboard');

    //Setting Routes (Admin)
    Route::get('/admin/setting','AdminController@setting');
    Route::get('/admin/check-pwd','Admincontroller@chkPassword');   
    Route::match(['get','post'],'/admin/update-pwd','Admincontroller@updatePassword');

    //Categories Routes (Admin)
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::get('/admin/view-category','CategoryController@viewCategory');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




