<?php

use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

 Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::get('main', [App\Http\Controllers\Api\MainApiController::class, 'index'])->name('main');
    Route::get('about',[App\Http\Controllers\Api\MainApiController::class, 'about'])->name('about');

    // For users

    Route::apiResource('/users',App\Http\Controllers\Api\UserApiController::class);
    Route::get('users/{userId}/make-admin', [App\Http\Controllers\Api\UserAPiController::class, 'giveAdmin'])->name('users.giveAdmin');
    Route::get('logout', [App\Http\Controllers\Api\LogApiController::class, 'logout'])->name('logout');
    Route::delete('users/{id}/delete', [App\Http\Controllers\Api\UserApiController::class, 'destroy']);

    //For Categories

    Route::apiResource('/categories',App\Http\Controllers\Api\CategoryApiController::class);
    Route::delete('categories/{id}/delete', [App\Http\Controllers\Api\CategoryApiController::class, 'destroy']);

    //For Subcategories

    Route::apiResource('/subcategories',App\Http\Controllers\Api\SubCategoryApiController::class);
    Route::delete('subcategories/{id}/delete', [App\Http\Controllers\Api\SubCategoryApiController::class, 'destroy'])->name('subcategories.destroy');

    // For Posts

    Route::apiResource('posts', App\Http\Controllers\Api\PostApiController::class);
    Route::delete('posts/{id}/delete', [App\Http\Controllers\Api\PostApiController::class, 'destroy'])->name('posts.destroy');

    // For Tags

    Route::apiResource('tags',App\Http\Controllers\Api\TagApiController::class);
    Route::delete('tags/{id}/delete', [App\Http\Controllers\Api\TagApiController::class, 'destroy'])->name('tags.destroy');

    Route::post('logout', [App\Http\Controllers\Api\LogApiController::class, 'logout']);

 });

// Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [App\Http\Controllers\Api\ForgotPasswordApiController::class, 'forgotpassword'])->name('password.request');
    Route::post('/ahmed', [App\Http\Controllers\Api\ForgotPasswordApiController::class, 'forgotPasswordPost'])->name('password.reset');
    Route::get('/reset-password/{token}', [App\Http\Controllers\Api\ForgotPasswordApiController::class, 'resetpassword']);
    Route::post('/reset-password', [App\Http\Controllers\Api\ForgotPasswordApiController::class, 'resetpasswordpost'])->name('reset.password.post');
    Route::post('/register', [App\Http\Controllers\Api\RegisterApiController::class, 'register']);
    Route::post('login', [App\Http\Controllers\Api\LogApiController::class, 'login']);
