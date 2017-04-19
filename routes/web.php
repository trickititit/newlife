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

Auth::routes();

Route::get('/home', 'HomeController@index');

//admin
Route::group(['prefix' => 'admin','middleware' => ['auth']],function() {

    //admin
    Route::get('/{type?}',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);

    Route::get('/object/create',['uses' => 'Admin\ObjectsController@create','as' => 'adminObjectCreate']);

    Route::post('/object/delete/image',['uses'=>'Admin\Storage@objDeleteImage','as'=>'adminObjDelImg']);
    Route::post('/object/upload/image',['uses'=>'Admin\Storage@objUploadImage','as'=>'adminObjUplImg']);
    Route::get('/object/image',['uses'=>'Admin\Storage@objGetImage','as'=>'adminObjGetImg']);

    
    
    // articles
//    Route::resource('/articles','Admin\ArticlesController');
//
//    Route::resource('/permissions','Admin\PermissionsController');
//
//    Route::resource('/users','Admin\UsersController');
//
//    //menus
//    Route::resource('/menus','Admin\MenusController');

});
