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

Route::get('/login', [AuthController::class, 'loginPage'])->name("loginPage");
Route::post('/login/submit', [AuthController::class, 'login'])->name("login");

Route::middleware("auth")->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'homePage')->name("index");
        Route::get('/home', 'homePage')->name("index");
        Route::get('/users', 'UsersPage')->name("users");
    });
    Route::controller(GroupeController::class)->group(function () {
        Route::get('/groupes', 'groupePage')->name("groupes");
        Route::get('/groupes/create', 'groupeCreationPage')->name("groupeCreate");
        Route::post('/groupes/submit', 'create')->name("groupeSubmit");
    });
    Route::controller(FamilleController::class)->group(function () {
        Route::get('/familles', 'FamillePage')->name("familles");
        Route::get('/familles/create', 'FamilleCreationPage')->name("familleCreate");
        Route::post('/familles/submit', 'create')->name("familleSubmit");
    });
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/articles', 'ArticlePage')->name("articles");
        Route::get('/articles/create', 'ArticleCreationPage')->name("articleCreate");
        Route::get('/articles/submit', 'create')->name("articleSubmit");
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('/users/create', 'registerPage')->name("registerPage");
        Route::post('/users/submit', 'register')->name("register");
    });
});
