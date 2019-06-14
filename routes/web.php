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
    Auth::routes();
    Route::get('/', 'AdminController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin', 'AdminController@index');

    Route::get('groups/remove_user/{uid}/{d}', 'WebControllers\GroupController@remove_user');
    Route::resources([
        'groups' => 'WebControllers\GroupController',
        'users' =>  'WebControllers\UserController'        
    ]);
    
    Route::post('/loaddata', 'WebControllers\GroupController@loadDataAjax');
    Route::post('/addUserToGroup', 'WebControllers\UserController@saveUserToGroup');
    Route::get('/addUserToGroup/{id}', 'WebControllers\UserController@addUserToGroup');