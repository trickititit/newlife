<?php

Route::get('/', ['uses' => 'IndexController@index', 'as' => 'site.index']);

Route::get('/object/{object}', ['uses' => 'ObjectController@index', 'as' => 'site.object']);
Route::get('/catalog/{order?}', ['uses' => 'CatalogController@index', 'as' => 'site.catalog']);
Route::get('/js/{file}', function($file = null)
{
    $path = storage_path().'/app/public/new_life/js/'.$file.".js";
    if (file_exists($path)) {
        return response()->download($path)->deleteFileAfterSend(true);
    }
});

Auth::routes();
//admin
Route::group(['prefix' => 'admin','middleware' => ['auth']],function() {
//
    Route::resource('/object', 'Admin\ObjectController',['except' => ['index']]);
    Route::resource('/user', 'Admin\UserController');
    Route::resource('/comfort', 'Admin\ComfortController',['only' => ['index', 'store', 'destroy']]);
    Route::group(['prefix' => 'settings'],function() {
       Route::get('/edit', ['uses' => 'Admin\SettingController@edit', "as" => 'settings.edit']);
       Route::put('/', ['uses' => 'Admin\SettingController@update', "as" => 'settings.update']);
    });
    Route::group(['prefix' => 'action'],function() {
        Route::put('/prework/{object}',['uses'=>'Admin\ObjectController@InPrework','as'=>'object.prework']);
        Route::put('/unwork/{object}',['uses'=>'Admin\ObjectController@Unwork','as'=>'object.unwork']);
        Route::put('/accessprework/{object}',['uses'=>'Admin\ObjectController@AccessPrework','as'=>'object.accessPreWork']);
        Route::put('/cancelprework/{object}',['uses'=>'Admin\ObjectController@CancelPrework','as'=>'object.cancelPreWork']);
        Route::put('/activate/{object}',['uses'=>'Admin\ObjectController@Activate','as'=>'object.activate']);
        Route::put('/restore/{object}',['uses'=>'Admin\ObjectController@Restore','as'=>'object.restore']);
        Route::delete('/softdelete/{object}',['uses'=>'Admin\ObjectController@softDelete','as'=>'object.softDelete']);
        Route::get('/export/{user?}',['uses'=>'Admin\ObjectController@export','as'=>'object.export']);
    });
    Route::group(['prefix' => 'image'],function() {
        Route::post('/delete',['uses'=>'Admin\Storage@objDeleteImage','as'=>'adminObjDelImg']);
        Route::post('/upload',['uses'=>'Admin\Storage@objUploadImage','as'=>'adminObjUplImg']);
        Route::get('/get',['uses'=>'Admin\Storage@objGetImage','as'=>'adminObjGetImg']);
    });
    //INDEX
    Route::get('/{type?}/{order?}',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);
});
