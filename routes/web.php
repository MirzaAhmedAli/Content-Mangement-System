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

    // For users

    Route::resource('users',App\Http\Controllers\UserController::class)->only(['index', 'store', 'edit', 'update']);
    Route::get('users/{userId}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('users.profile');
    Route::get('users/{userId}/make-admin', [App\Http\Controllers\UserController::class, 'giveAdmin'])->name('users.giveAdmin');
    Route::get('logout', [App\Http\Controllers\LogController::class, 'logout'])->name('logout');
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

    //For Categories

    Route::resource('categories',App\Http\Controllers\CategoriesController::class)->only(['index', 'store']);
    Route::get('categories/{id}/edit', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('edit.category');
    Route::put('categories/{id}/edit', [App\Http\Controllers\CategoriesController::class, 'update']);
    Route::get('categories/{categoryId}/show',[App\Http\Controllers\CategoriesController::class, 'show']);
    Route::get('create-category',[App\Http\Controllers\CategoriesController::class, 'create'])->name('create.category');
    Route::get('categories/{categoryId}/delete', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('delete.category');

    //For Subcategories

    Route::get('create-subcategory',[App\Http\Controllers\SubCategoriesController::class, 'create'])->name('create.subcategory');
    Route::post('create-subcategory',[App\Http\Controllers\SubCategoriesController::class, 'store'])->name('store.subcategory');
    Route::get('subcategories',[App\Http\Controllers\SubCategoriesController::class, 'index'])->name('subcategory.index');
    Route::get('subcategories/{subcategoryId}/delete', [App\Http\Controllers\SubCategoriesController::class, 'destroy'])->name('subcategories.destroy');
    Route::get('subcategories/{subcategoryId}/edit', [App\Http\Controllers\SubCategoriesController::class, 'edit'])->name('subcategories.edit');
    Route::put('subcategories/{subcategoryId}/edit', [App\Http\Controllers\SubCategoriesController::class, 'update']);
    Route::get('subcategories/{subcategory}', [App\Http\Controllers\SubCategoriesController::class, 'showPosts'])->name('subcategories.posts');

    // For Posts

    Route::get('posts', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create')->middleware('verified');
    Route::post('posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store')->middleware('verified');
    Route::get('posts/{postId}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit')->middleware('verified');
    Route::put('posts/{postId}/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update')->middleware('verified');
    Route::get('posts/{postId}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

    // For Tags

    Route::resource('tags',App\Http\Controllers\TagController::class)->only(['index', 'store', 'edit', 'update']);
    Route::get('tag-create', [App\Http\Controllers\TagController::class, 'create'])->name('tags.create');
    Route::get('tags/{tagId}/delete', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'forgotpassword'])->name('password.request');
    Route::post('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'forgotPasswordPost'])->name('password.reset');
    Route::get('/reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'resetpassword']);
    Route::put('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'resetpasswordpost'])->name('reset.password.post');
    Route::get('register', [App\Http\Controllers\RegisterController::class, 'create']);
    Route::post('register', [App\Http\Controllers\RegisterController::class, 'store']);
    Route::get('login', [App\Http\Controllers\LogController::class, 'login'])->name('login');
    Route::post('login', [App\Http\Controllers\LogController::class, 'userLogin']);
});
    
 


