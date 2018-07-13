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
//
//Route::get('/test', function () {
//    return view('test');
//});
Route::post('/next_man/',['uses'=>'MainController@next_man','as'=>'next_man']);
Route::get('/out/',['uses'=>'Auth\LoginController@logout','as'=>'out']);
Route::get('/',['uses'=>'MainController@index','as'=>'main']);
Route::post('/global_search',['uses'=>'MainController@global_search','as'=>'global_search']);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'user','middleware'=>['web','auth']],function (){
        Route::post('/delete',['uses'=>'UserController@delete','as'=>'delete']);
        Route::post('/test_data_for_save',['uses'=>'UserController@test_data_for_save','as'=>'test_data_for_save']);
        Route::post('/filter',['uses'=>'UserController@filter','as'=>'main']);
        Route::get('/list/{page?}/{filter?}',['uses'=>'UserController@index','as'=>'main']);
        Route::get('/edit/{id}',['middleware'=>'auth','uses'=>'UserController@edit_get','as'=>'main']);
        Route::post('/save_img',['uses'=>'UserController@save_img','as'=>'save_img']);
        Route::post('/save',['uses'=>'UserController@save','as'=>'save']);
        Route::post('/save2',['uses'=>'UserController@save2','as'=>'save2']);
});