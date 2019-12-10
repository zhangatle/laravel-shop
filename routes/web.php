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

Route::get('/', 'PagesController@root')->name('root');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']],function (){
    Route::get('user_addresses',"userAddressController@index")->name('user_addresses.index');
    Route::get('user_addresses/create',"userAddressController@create")->name('user_addresses.create');
    Route::post('user_addresses', 'UserAddressController@store')->name('user_addresses.store');
    Route::get('user_addresses/{user_address}','UserAddressController@edit')->name('user_addresses.edit');
    Route::put('user_addresses/{user_address}', 'UserAddressController@update')->name('user_addresses.update');
    Route::delete('user_addresses/{user_address}', 'UserAddressController@destroy')->name('user_addresses.destroy');
});
