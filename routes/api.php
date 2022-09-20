<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\staffController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','AuthController@register');
Route::post('login','AuthController@login');

Route::group(['middleware'=>'jwt.verify'],function(){ 
    Route::resource('user','UserController');    
    Route::resource('staff','staffController');    
 });
 Route::post('/import_excel/import', 'ImportExcelController@import');
 Route::get('/export_excel/export', 'ImportExcelController@export');
 Route::post('/import_excel/importUser', 'ImportExcelController@importUser');
