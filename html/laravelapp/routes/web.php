<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/delimiter', 'TitleController@delimiter');
Route::get('/maxnum', 'TitleController@maxnum');
Route::get('/first/{id}', 'TitleController@first');
Route::get('/second/{id}', 'TitleController@second');
Route::get('/third/{id}', 'TitleController@third');
Route::get('/check/{id}', 'TitleController@check');
