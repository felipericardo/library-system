<?php


Route::auth();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('books', 'BooksController');
    Route::resource('customers', 'CustomersController');

    Route::get('/records/create', ['as' => 'records.create', 'uses' => 'RecordsController@create']);
    Route::post('/records', ['as' => 'records.store', 'uses' => 'RecordsController@store']);
    Route::get('/records/{id}/edit', ['as' => 'records.edit', 'uses' => 'RecordsController@edit']);
    Route::put('/records/{id}', ['as' => 'records.update', 'uses' => 'RecordsController@update']);
    Route::delete('/records/{id}', ['as' => 'records.destroy', 'uses' => 'RecordsController@destroy']);
    Route::get('/records/{id}/complete', ['as' => 'records.complete', 'uses' => 'RecordsController@complete']);
});
