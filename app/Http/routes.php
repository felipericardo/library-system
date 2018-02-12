<?php


Route::auth();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('books', 'BooksController');
    Route::resource('customers', 'CustomersController');
});
