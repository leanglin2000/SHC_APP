<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemoController;
/*7
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');  
});

Route::get('/tag',function(){
    return 'this is tag page';
});

Route::get('/category',function(){
    return 'this is category page';
});

Route::get('/blog',function(){
    return 'this is blog page';
});
*/
Route::get('/tag',[DemoController::class,'tag']);
Route::get('/category',[DemoController::class,'category']);
Route::get('/blog',[DemoController::class,'blog']);