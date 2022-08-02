<?php
Route::group(['middleware'=> 'auth'],function () {
    Route::get('/home',function (){
        return view('backend.dashboard.index');
    });
    Route::get('settings', 'App\Http\Controllers\Admin\SettingController@index')->name('admin.settings');
    Route::post('settings', 'App\Http\Controllers\Admin\SettingController@update')->name('admin.settings.update');
});
