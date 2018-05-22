<?php
Route::get('/category/tree', 'CategoryController@tree');
Route::get('/category/products/{category_id}', 'CategoryController@products');
Route::get('category', 'CategoryController@index');
Route::get('category/{id}', 'CategoryController@show');
Route::post('category', 'CategoryController@store');
Route::put('category/{id}', 'CategoryController@update');
Route::delete('category/{id}', 'CategoryController@delete');

Route::get('product', 'ProductController@index');
Route::get('product/{id}', 'ProductController@show');
Route::post('product', 'ProductController@store');
Route::put('product/{id}', 'ProductController@update');
Route::delete('product/{id}', 'ProductController@delete');