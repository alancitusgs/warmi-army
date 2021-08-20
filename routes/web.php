
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Auth::routes();

Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/boxed', [StaterkitController::class, 'layout_boxed'])->name('layout-boxed');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');

Route::get('capacitacion', [StaterkitController::class, 'capacitacion'])->name('capacitacion');

//Route::get('capacitacion', [ProjectController::class, 'index'])->name('capacitacion');

Route::get('empresarial', [StaterkitController::class, 'empresarial'])->name('empresarial');

Route::get('yowarmi', [StaterkitController::class, 'yowarmi'])->name('yowarmi');

Route::get('podcast', [StaterkitController::class, 'podcast'])->name('podcast');



Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


//Route::get('/projects/create', 'ProjectController@create' )->name('projects.create');





Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
//Route::post('/projects', 'ProjectController@store' )->name('projects.store');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
