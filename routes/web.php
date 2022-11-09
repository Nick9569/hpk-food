<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');;
});
Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/order/{id}', 'OrderController')->name('post.order');
    Route::post('/search', 'SearchController')->name('post.search');
    Route::get('/{post}', 'ShowController')->name('post.show');

    Route::group(['namespace'=>'Comment', 'prefix'=>'{post}/comments'], function (){
        Route::post('/','StoreController')->name('post.comment.store');
    });
    Route::group(['namespace'=>'Like', 'prefix'=>'{post}/likes'], function (){
        Route::post('/','StoreController')->name('post.like.store');
    });
});
Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');;

    Route::group(['namespace'=>'Post', 'prefix'=>'{category}/posts'], function (){
        Route::get('/','IndexController')->name('category.post.index');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
Route::get('logout','Auth\LoginController@logout');

