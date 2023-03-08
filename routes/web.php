<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Exceptions\InvalidOrderException;


Route::group(['namespace'=>'App\Http\Controllers\Main'], function()
{
    Route::get('/', IndexController::class);
});

Route::group(['namespace' => 'Admin','prefix' => 'admin'], function()
{

    Route::group(['namespace'=>'Admin\Main'], function()
    {
        Route::get('/', [AdminController::class, '__invoke']);
    });

});

Route::group(['namespace'=>'App\Http\Controllers\Admin\Category', 'prefix' => 'categories'], function()
    {
    Route::get('/', 'IndexController')->name('admin.category.index');
    Route::get('/create', 'CreateController')->name('admin.category.create');
    Route::post('/', 'StoreController')->name('admin.category.store');
    Route::get('/{category}', 'ShowController')->name('admin.category.show');
    Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
    Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
    });

Auth::routes();

