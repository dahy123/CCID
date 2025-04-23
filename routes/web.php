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

Route::get('/', [Controller::class,'dashboard'])->name('dashboard');

Route::get('/operateurs',[OperateursController::class,'index'])->name('operateurs.index');
Route::get('/operateurs/create',[OperateursController::class,'create'])->name('operateurs.create');
Route::post('/operateurs/store',[OperateursController::class,'store'])->name('operateurs.store');
Route::get('/operateurs/{id}/edit',[OperateursController::class,'edit'])->name('operateurs.edit');
Route::post('/operateurs/{id}/update',[OperateursController::class,'update'])->name('operateurs.update');
Route::get('/operateurs/{id}/destroy',[OperateursController::class,'destroy'])->name('operateurs.destroy');
Route::get('/operateurs/{id}/show', [OperateursController::class, 'show'])->name('operateurs.show');
Route::get('/operateurs/{id}/pdf', [OperateursController::class, 'downloadPdf'])->name('operateurs.pdf');

Route::get('/activites',[ActivitesController::class,'index'])->name('activisites.index');
Route::get('/activites/create',[ActivitesController::class,'create'])->name('activites.create');
Route::post('/activites/store',[ActivitesController::class,'store'])->name('activites.store');
Route::get('/activites/{id}/edit',[ActivitesController::class,'edit'])->name('activites.edit');
Route::post('/activites/{id}/update',[ActivitesController::class,'update'])->name('activites.update');
Route::get('/activites/{id}/destroy',[ActivitesController::class,'destroy'])->name('activites.destroy');

Route::get('/visiteurs',[VisiteursController::class,'index'])->name('visiteurs.index');
Route::get('/visiteurs/create',[VisiteursController::class,'create'])->name('visiteurs.create');
Route::post('/visiteurs/store',[VisiteursController::class,'store'])->name('visiteurs.store');
Route::get('/visiteurs/{id}/edit',[VisiteursController::class,'edit'])->name('visiteurs.edit');
Route::post('/visiteurs/{id}/update',[VisiteursController::class,'update'])->name('visiteurs.update');
Route::get('/visiteurs/{id}/destroy',[VisiteursController::class,'destroy'])->name('visiteurs.destroy');

Route::get('/utilisateurs',[UtilisateursController::class,'index'])->name('utilisateurs.index');
Route::get('/utilisateurs/create',[UtilisateursController::class,'create'])->name('utilisateurs.create');
Route::post('/utilisateurs/store',[UtilisateursController::class,'store'])->name('utilisateurs.store');
Route::get('/utilisateurs/{id}/edit',[UtilisateursController::class,'edit'])->name('utilisateurs.edit');
Route::post('/utilisateurs/{id}/update',[UtilisateursController::class,'update'])->name('utilisateurs.update');
Route::get('/utilisateurs/{id}/destroy',[UtilisateursController::class,'destroy'])->name('utilisateurs.destroy');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


