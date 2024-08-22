<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('main', function () {
//     return view('pages.main');
// })->middleware(['auth', 'verified'])->name('main');

Route::get('register', [App\Http\Controllers\RegisterController::class, 'create']);
Route::post('register', [App\Http\Controllers\RegisterController::class, 'store']);
Route::get('login', [App\Http\Controllers\LogController::class, 'login'])->name('login');
Route::post('login', [App\Http\Controllers\LogController::class, 'userLogin']);
Route::get('main', [App\Http\Controllers\RegisterController::class, 'mainpage'])->middleware('auth')->name('main');
Route::get('logout', [App\Http\Controllers\LogController::class, 'logout'])->middleware('auth')->name('logout');
//Route::get('forgotpassword', [App\Http\Controllers\ForgotPasswordController::class, 'edit'])->name('edit');

    Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'forgotpassword'])->name('password.request');
    Route::post('/ahmed', [App\Http\Controllers\ForgotPasswordController::class, 'forgotPasswordPost'])->name('password.reset');
    Route::get('/reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'resetpassword']);
    Route::post('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'resetpasswordpost'])->name('reset.password.post');

    
 


