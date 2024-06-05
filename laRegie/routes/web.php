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
    Route::get('/home', [HomeController::class, 'homePage'])->name("index");
    Route::get('/groupes', [GroupeController::class, 'groupePage'])->name("groupes");
    Route::get('/familles', [FamilleController::class, 'FamillePage'])->name("familles");
    Route::get('/articles', [ArticleController::class, 'ArticlePage'])->name("articles");
    Route::middleware('higher')->group(function () {
        Route::controller(GroupeController::class)->group(function () {
            Route::get('/groupes/create', 'groupeCreationPage')->name("groupeCreate");
            Route::post('/groupes/submit', 'create')->name("groupeSubmit");
        });
        Route::controller(FamilleController::class)->group(function () {
            Route::get('/familles/create', 'FamilleCreationPage')->name("familleCreate");
            Route::post('/familles/submit', 'create')->name("familleSubmit");
        });
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/articles/create', 'ArticleCreationPage')->name("articleCreate");
            Route::get('/articles/submit', 'create')->name("articleSubmit");
        });
    });
    Route::middleware('admin')->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name("users.index");
        Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name("users.edit");
        Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name("users.update");
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name("users.destroy");
        Route::controller(AuthController::class)->group(function () {
            Route::get('/admin/users/create', 'registerPage')->name("registerPage");
            Route::post('/admin/users/submit', 'register')->name("register");
        });
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
