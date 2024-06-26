<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('photos', App\Http\Controllers\PhotoController::class);
Route::resource('photoDetails', App\Http\Controllers\Photo_detailController::class);
Route::resource('rols', App\Http\Controllers\RolController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::post('generateToken/{user}', [App\Http\Controllers\TokenController::class, 'generateToken'])->name('generateToken');
Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
}); 
Route::resource('qrcodes', App\Http\Controllers\QrcodeController::class);
Route::resource('transactions', App\Http\Controllers\TransactionController::class);
Route::post('pay', [App\Http\Controllers\PaymentController::class, 'pay'])->name('payment'); 
Route::get('success', [App\Http\Controllers\PaymentController::class, 'success']); 
Route::get('error', [App\Http\Controllers\PaymentController::class, 'error']);