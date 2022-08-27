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

    Route::group(['prefix'=> 'services'],function (){
        Route::get('/','App\Http\Controllers\Admin\ServiceController@index')->name('admin.services.index');
        Route::get('/create','App\Http\Controllers\Admin\ServiceController@create')->name('admin.services.create');
        Route::post('/store','App\Http\Controllers\Admin\ServiceController@store')->name('admin.services.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\ServiceController@edit')->name('admin.services.edit');
        Route::post('update','App\Http\Controllers\Admin\ServiceController@update')->name('admin.services.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\ServiceController@delete')->name('admin.services.delete');
    });

    Route::group(['prefix'=> 'packages'],function (){
        Route::get('/','App\Http\Controllers\Admin\PackageController@index')->name('admin.packages.index');
        Route::get('/create','App\Http\Controllers\Admin\PackageController@create')->name('admin.packages.create');
        Route::post('/store','App\Http\Controllers\Admin\PackageController@store')->name('admin.packages.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\PackageController@edit')->name('admin.packages.edit');
        Route::post('update','App\Http\Controllers\Admin\PackageController@update')->name('admin.packages.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\PackageController@delete')->name('admin.packages.delete');
    });
});
