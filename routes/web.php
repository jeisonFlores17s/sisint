<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\PortafolioController;

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

//Route::get('/', function () {
 //   return view('auth/login');
//});
Route::get('/', [PortafolioController::class, 'index']);
Route::get('/administrarportafolio', [PortafolioController::class, 'administrarportafolio'])->name('administrarportafolio');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route area

Route::get('/areas',[AreaController::class, 'index'] )->name('area');
Route::get('/articulos',[ArticulosController::class, 'index'] )->name('articulos');
Route::get('/revisararticulos',[ArticulosController::class, 'revisararticulos'] )->name('revisararticulos');
Route::get('/responsables',[ResponsableController::class, 'index'] )->name('responsables');

//Route::get('file-export', [App\http\Livewire\Area\Index::class, 'fileExport'])->name('file-export');
Route::get('AreaExport', [App\http\Livewire\Area\Index::class, 'AreaTodosExport'])->name('AreaExport');

Route::get('Responsableexport', [App\http\Livewire\Responsable\Index::class, 'ResponsableExport'])->name('Responsableexport');
Route::get('ResponsableTodosExport', [App\http\Livewire\Responsable\Index::class, 'ResponsableTodosExport'])->name('ResponsableTodosExport');