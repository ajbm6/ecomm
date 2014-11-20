<?php

Route::get('/', ['uses' => 'StoreController@getIndex']);

Route::controller('admin/categories', 'CategoriesController');

Route::controller('admin/products', 'ProductsController');

Route::controller('store', 'StoreController');