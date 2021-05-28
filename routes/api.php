<?php

use Illuminate\Http\Request;


use App\Http\Controllers\API\BlogAPIController;
use App\Http\Controllers\API\AccountAPIController;
use App\Http\Controllers\API\AddressBookAPIController;

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


Route::post('Login', [AccountAPIController::class,'login']);
Route::post('RegisterUser', [AccountAPIController::class,'RegisterUser']);

Route::group(['prefix'=>'blog'],function(){
    // BlogAPIController
    Route::get('/{user_id}',[BlogAPIController::class,'index']);
    Route::post('/store/{user_id}',[BlogAPIController::class,'store']);
    Route::get('/show/{blog_id}',[BlogAPIController::class,'show']);
    Route::post('/update/{blog_id}',[BlogAPIController::class,'update']);
    Route::delete('/delete/{blog_id}',[BlogAPIController::class,'destroy']);

});
