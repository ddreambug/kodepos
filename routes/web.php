<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KotaDropdownController;

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
Route::get('/',function(){
    return redirect("http://127.0.0.1:8000/input");
});
Route::get('/input', function(){
    return view('input');
});
Route::post('/input/store',[DataController::class,'store']);
Route::get('/data',[DataController::class,'index']);
Route::post('data/route',[DataController::class,'fetch'])->name('datacontroller.fetch');