<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormHandlerController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\Beheer\UsersBeheerController;
use App\Http\Controllers\Beheer\ExamenBeheerController;
use App\Http\Controllers\Beheer\OpleidingBeheerController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [ExamenController::class, 'p1'])->name('p1');
Route::get('/p2', [ExamenController::class, 'p2'])->name('p2');
Route::get('/p3', [ExamenController::class, 'p3'])->name('p3');
Route::get('/p4', [ExamenController::class, 'p4'])->name('p4');
Route::get('/p5', [ExamenController::class, 'p5'])->name('p5');

Route::POST('/f2', [FormHandlerController::class, 'f2'])->name('f2');
Route::POST('/f3', [FormHandlerController::class, 'f3'])->name('f3');
Route::POST('/f4', [FormHandlerController::class, 'f4'])->name('f4');
Route::POST('/f5', [FormHandlerController::class, 'f5'])->name('f5');
Route::POST('/f6', [FormHandlerController::class, 'f6'])->name('f6');

Route::get('/home', function () {return view('home');})->name('home');
Route::get('/sitemap', function () {return view('paginas.sitemap');})->name('sitemap');
Route::get('/over-ons', function () {return view('paginas.about-us');})->name('over-ons');
Route::get('/privacy-policy', function () {return redirect('https://www.deltion.nl/privacy');})->name('privacy-policy');

Route::resource('/beheer/users', UsersBeheerController::class);
Route::resource('/beheer/examens', ExamenBeheerController::class);
Route::resource('/beheer/opleidingen', OpleidingBeheerController::class);