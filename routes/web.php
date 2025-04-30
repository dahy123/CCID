<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OperateursController;
use App\Http\Controllers\ActivitesController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\VisiteursController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware("auth")->group(function () {
    Route::get('/', [Controller::class, 'dashboard'])->name('dashboard');

    Route::controller(OperateursController::class)->group(function () {
        Route::get("/operateurs", "index")->name("operateurs.index");
        Route::get('/operateurs/create', 'create')->name('operateurs.create');
        Route::post('/operateurs/store', 'store')->name('operateurs.store');
        Route::get('/operateurs/{id}/edit', 'edit')->name('operateurs.edit');
        Route::post('/operateurs/{id}/update', 'update')->name('operateurs.update');
        Route::get('/operateurs/{id}/destroy', 'destroy')->name('operateurs.destroy');
        Route::get('/operateurs/{id}/show', 'show')->name('operateurs.show');
        Route::get('/operateurs/{id}/pdf', 'downloadPdf')->name('operateurs.pdf');
    });

    Route::controller(ActivitesController::class)->group(function () {
        Route::get('/activites', 'index')->name('activisites.index');
        Route::get('/activites/create', 'create')->name('activites.create');
        Route::post('/activites/store', 'store')->name('activites.store');
        Route::get('/activites/{id}/edit', 'edit')->name('activites.edit');
        Route::post('/activites/{id}/update', 'update')->name('activites.update');
        Route::get('/activites/{id}/destroy', 'destroy')->name('activites.destroy');
    });

    Route::get('/visiteurs', [VisiteursController::class, 'index'])->name('visiteurs.index');
    Route::get('/visiteurs/create', [VisiteursController::class, 'create'])->name('visiteurs.create');
    Route::post('/visiteurs/store', [VisiteursController::class, 'store'])->name('visiteurs.store');
    Route::get('/visiteurs/{id}/edit', [VisiteursController::class, 'edit'])->name('visiteurs.edit');
    Route::post('/visiteurs/{id}/update', [VisiteursController::class, 'update'])->name('visiteurs.update');
    Route::get('/visiteurs/{id}/destroy', [VisiteursController::class, 'destroy'])->name('visiteurs.destroy');

    Route::get('/utilisateurs', [UtilisateursController::class, 'index'])->name('utilisateurs.index');
    Route::get('/utilisateurs/create', [UtilisateursController::class, 'create'])->name('utilisateurs.create');
    Route::post('/utilisateurs/store', [UtilisateursController::class, 'store'])->name('utilisateurs.store');
    Route::get('/utilisateurs/{id}/edit', [UtilisateursController::class, 'edit'])->name('utilisateurs.edit');
    Route::post('/utilisateurs/{id}/update', [UtilisateursController::class, 'update'])->name('utilisateurs.update');
    Route::get('/utilisateurs/{id}/destroy', [UtilisateursController::class, 'destroy'])->name('utilisateurs.destroy');


});



Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/toLogin', [AuthController::class, 'toLogin'])->name('auth.toLogin');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


