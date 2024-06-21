<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'loginPage'])->name("login");
Route::post('/login/submit', [AuthController::class, 'login'])->name("loginSubmit");

Route::middleware("auth")->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name("index");
    Route::get('/profile', [HomeController::class, 'profile'])->name("profile");
    Route::put('/profile/update', [HomeController::class, 'update'])->name("profile.update");
    Route::get('/groupes', [GroupeController::class, 'index'])->name("groupes");
    Route::get('/familles', [FamilleController::class, 'index'])->name("familles");
    Route::get('/articles', [ArticleController::class, 'index'])->name("articles");
    Route::get('/articles/{article}/view', [ArticleController::class, 'view'])->name("article.view");
    Route::middleware('higher')->group(function () {
        Route::controller(GroupeController::class)->group(function () {
            Route::get('/groupes/create', 'create')->name("groupes.create");
            Route::post('/groupes/submit', 'submit')->name("groupes.submit");
            Route::get('/groupes/{groupe}/edit', 'edit')->name("groupes.edit");
            Route::put('/groupes/{groupe}/update', 'update')->name("groupes.update");
            Route::delete('/groupes/{groupe}', 'destroy')->name("groupes.destroy");
        });
        Route::controller(FamilleController::class)->group(function () {
            Route::get('/familles/create', 'create')->name("familles.create");
            Route::post('/familles/submit', 'submit')->name("familles.submit");
            Route::get('/familles/{famille}/edit', 'edit')->name("familles.edit");
            Route::put('/familles/{famille}/update', 'update')->name("familles.update");
            Route::delete('/familles/{famille}', 'destroy')->name("familles.destroy");
        });
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/articles/create', 'create')->name("articles.create");
            Route::post('/articles/submit', 'submit')->name("articles.submit");
            Route::get('/articles/{article}/edit', 'edit')->name("articles.edit");
            Route::put('/articles/{article}/update', 'update')->name("articles.update");
            Route::delete('/articles/{article}', 'destroy')->name("articles.destroy");
        });
    });
    Route::middleware('admin')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/admin/users', 'index')->name("users.index");
            Route::get('/admin/users/create', 'create')->name("users.create");
            Route::post('/admin/users/submit', 'submit')->name("users.submit");
            Route::get('/admin/users/{user}/edit', 'edit')->name("users.edit");
            Route::put('/admin/users/{user}/update', 'update')->name("users.update");
            Route::delete('/admin/users/{user}', 'destroy')->name("users.destroy");
        });
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
