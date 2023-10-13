<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Master Karyawan
    // Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('/masters', 'MasterKaryawanController');

    // Daftar Cuti
    Route::resource('/cutis', 'DataCutiController');

    // Transaksi Cuti
    Route::get('/trans_cutis/cari', 'TransaksiCutiController@cari')->name("trans_cutis.cari");   
    Route::get('/trans_cutis/jenis', 'TransaksiCutiController@jenis')->name('trans_cutis.jenis');
    Route::resource('/trans_cutis', 'TransaksiCutiController');
});
