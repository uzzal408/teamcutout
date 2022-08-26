<?php
Route::group(['middleware'=> 'auth'],function () {
    Route::get('/home',function (){
        return view('backend.dashboard.index');
    });
    Route::get('settings', 'App\Http\Controllers\Admin\SettingController@index')->name('admin.settings');
    Route::post('settings', 'App\Http\Controllers\Admin\SettingController@update')->name('admin.settings.update');

    Route::group(['prefix'=> 'sliders'],function (){
        Route::get('/','App\Http\Controllers\Admin\SliderController@index')->name('admin.sliders.index');
        Route::get('/create','App\Http\Controllers\Admin\SliderController@create')->name('admin.sliders.create');
        Route::post('/store','App\Http\Controllers\Admin\SliderController@store')->name('admin.sliders.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\SliderController@edit')->name('admin.sliders.edit');
        Route::post('update','App\Http\Controllers\Admin\SliderController@update')->name('admin.sliders.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\SliderController@delete')->name('admin.sliders.delete');

    });

    Route::group(['prefix'=> 'abouts'],function (){
        Route::get('/','App\Http\Controllers\Admin\AboutController@index')->name('admin.abouts.index');
        Route::get('/create','App\Http\Controllers\Admin\AboutController@create')->name('admin.abouts.create');
        Route::post('/store','App\Http\Controllers\Admin\AboutController@store')->name('admin.abouts.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\AboutController@edit')->name('admin.abouts.edit');
        Route::post('update','App\Http\Controllers\Admin\AboutController@update')->name('admin.abouts.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\AboutController@delete')->name('admin.abouts.delete');

    });
});
