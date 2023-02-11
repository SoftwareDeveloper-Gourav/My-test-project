<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;
use App\Http\Controllers\App;

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
Route::get('registration',[Main::class, 'index']);
// Route::view('registration','registration');
Route::post('/user_registration',[Main::class,'Registration']);
Route::get('/user',[Main::class,'show']);
Route::get('/user/trash/{id}',[Main::class,'trash']);
Route::get('/user/trash_data',[Main::class,'trash_data']);
Route::get('/user/delete/{id}',[Main::class,'delete']);
Route::get('/user/restore/{id}',[Main::class,'restore']);
Route::get('/user/edit/{id}',[Main::class,'edit']);
Route::post('/user/edit/update/{id}',[Main::class,'update']);

// THIS IS A APPLICATION 
Route::get('app',function(){
    return view('test.index');
});
Route::post('form',[App::class,'store']);
Route::get('Products',[App::class,'all']);
Route::get('Buy/{id}',[App::class,'buy']);
Route::get('Payment',function(){
    return view('test.payment');
});
Route::post('Payment',[App::class,'payment']);