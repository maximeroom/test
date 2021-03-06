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
Route::get('/', function(){
    return redirect('Product');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ],
    function()
    {
        Route::get('Product/{id?}', 'ProductController@index');
    });

Route::get('Admin', 'AdminController@index')->middleware('checkadmin');

Route::get('/home', 'HomeController@index');

Route::get('/forbidden', 'ForbiddenController@index');

Auth::routes();