<?php

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

Route::get('/', [AuthController::class, 'loginPage'])->name("loginPage");
Route::post('/login', [AuthController::class, 'login'])->name("login");

Route::get('/home', [HomeController::class, 'homePage'])->name("index");
Route::get('/groupes', [GroupeController::class, 'groupePage'])->name("groupes");
Route::get('/groupes/create', [GroupeController::class, 'groupeCreationPage'])->name("groupeCreate");
Route::post('/groupes/submit', [GroupeController::class, 'create'])->name("groupeSubmit");
Route::get('/familles', [FamilleController::class, 'FamillePage'])->name("familles");
Route::get('/familles/create', [FamilleController::class, 'FamilleCreationPage'])->name("familleCreate");
Route::post('/familles/submit', [FamilleController::class, 'create'])->name("familleSubmit");

Route::middleware("auth")->group(function () {
    
});
