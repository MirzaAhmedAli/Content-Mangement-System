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

Route::middleware('auth')->group(function () {
    Route::get('main', [App\Http\Controllers\MainPageController::class, 'index'])->name('main');
    Route::get('about',[App\Http\Controllers\MainPageController::class, 'about'])->name('about');
    Route::resource('users',App\Http\Controllers\UserController::class)->only(['index', 'store', 'edit', 'update']);
    Route::get('users/{userId}/make-admin', [App\Http\Controllers\UserController::class, 'giveAdmin'])->name('users.giveAdmin');
    Route::get('logout', [App\Http\Controllers\LogController::class, 'logout'])->name('logout');
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
    Route::resource('categories',App\Http\Controllers\CategoriesController::class)->only(['index', 'store']);
    Route::get('categories/{id}/edit', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('edit.category');
    Route::put('categories/{id}/edit', [App\Http\Controllers\CategoriesController::class, 'update']);
    Route::get('categories/{categoryId}/show',[App\Http\Controllers\CategoriesController::class, 'show']);
    Route::get('create-category',[App\Http\Controllers\CategoriesController::class, 'create'])->name('create.category');
    Route::get('categories/{categoryId}/delete', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('delete.category');
    Route::get('create-subcategory',[App\Http\Controllers\SubCategoriesController::class, 'create'])->name('create.subcategory');
    Route::post('create-subcategory',[App\Http\Controllers\SubCategoriesController::class, 'store'])->name('store.subcategory');
    Route::get('subcategories',[App\Http\Controllers\SubCategoriesController::class, 'index'])->name('subcategory.index');
    Route::get('subcategories/{subcategoryId}/delete', [App\Http\Controllers\SubCategoriesController::class, 'destroy'])->name('subcategories.destroy');
    Route::put('subcategories/{subcategoryId}/edit', [App\Http\Controllers\SubCategoriesController::class, 'edit'])->name('subcategories.edit');
    Route::get('subcategories/{subcategoryId}/edit', [App\Http\Controllers\SubCategoriesController::class, 'update']);

});

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'forgotpassword'])->name('password.request');
    Route::post('/ahmed', [App\Http\Controllers\ForgotPasswordController::class, 'forgotPasswordPost'])->name('password.reset');
    Route::get('/reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'resetpassword']);
    Route::post('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'resetpasswordpost'])->name('reset.password.post');
    Route::get('register', [App\Http\Controllers\RegisterController::class, 'create']);
    Route::post('register', [App\Http\Controllers\RegisterController::class, 'store']);
    Route::get('login', [App\Http\Controllers\LogController::class, 'login'])->name('login');
    Route::post('login', [App\Http\Controllers\LogController::class, 'userLogin']);
});
    
 


