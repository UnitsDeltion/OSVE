<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExamenBeheerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/p3', function () {
    return view('p3');
});

Route::get('/home', function () {return view('home');})->name('home');
Route::get('/sitemap', function () {return view('paginas.sitemap');})->name('sitemap');
Route::get('/over-ons', function () {return view('paginas.about-us');})->name('over-ons');
Route::get('/privacy-policy', function () {return redirect('https://www.deltion.nl/privacy');})->name('privacy-policy');

Route::resource('/beheer/examens', ExamenBeheerController::class);