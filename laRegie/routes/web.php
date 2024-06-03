<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\HomeController;
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
    Route::controller(GroupeController::class)->group(function () {
        Route::get('/groupes', 'groupePage')->name("groupes");
        Route::get('/groupes/create', 'groupeCreationPage')->name("groupeCreate");
    });
    Route::controller(FamilleController::class)->group(function () {
        Route::get('/familles', 'FamillePage')->name("familles");
        Route::get('/familles/create', 'FamilleCreationPage')->name("familleCreate");
    });
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'ArticlePage')->name("articles");
        Route::get('/articles/create', 'ArticleCreationPage')->name("articleCreate");
    });
    Route::middleware('admin')->group(function () {
        Route::get('/admin/users', [HomeController::class, 'UsersPage'])->name("users");
        Route::post('/groupes/submit', [GroupeController::class, 'create'])->name("groupeSubmit");
        Route::post('/familles/submit', [FamilleController::class, 'create'])->name("familleSubmit");
        Route::get('/articles/submit', [ArticleController::class, 'create'])->name("articleSubmit");
        Route::controller(AuthController::class)->group(function () {
            Route::get('/admin/users/create', 'registerPage')->name("registerPage");
            Route::post('/admin/users/submit', 'register')->name("register");
        });
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
