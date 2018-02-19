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

Route::get('/', function () {
    return view('welcome');
});





Route::post("/users/create", "UsersController@addUser");
Route::post("/users/add-task/{userId}", "UsersController@addTask");
Route::get("/users/get/{id}", "UsersController@getUserById");