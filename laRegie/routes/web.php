<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
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

Route::get('/', [AuthController::class, 'loginPage'])->name("loginPage");
Route::post('/login', [AuthController::class, 'login'])->name("login");

Route::get('/home', [HomeController::class, 'homePage'])->name("index");
Route::get('/groups', [GroupController::class, 'groupsPage'])->name("groups");

Route::middleware("auth")->group(function () {
    
});
