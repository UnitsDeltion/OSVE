<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ICSController;
use App\Http\Controllers\OSVEController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\FormHandlerController;

use App\Http\Controllers\Beheer\UsersBeheerController;
use App\Http\Controllers\Beheer\ExamenBeheerController;
use App\Http\Controllers\Beheer\OpleidingBeheerController;
use App\Http\Controllers\Beheer\DashboardBeheerController;
use App\Http\Controllers\Beheer\ReglementenBeheerController;
use App\Http\Controllers\Beheer\ExamenMomentBeheerController;
use App\Http\Controllers\Beheer\GeplandeExamensBeheerController;

Route::get('/', [OSVEController::class, 'p1'])->name('p1');
Route::get('/p1', [OSVEController::class, 'redirect']);
Route::get('/p2', [OSVEController::class, 'p2'])->name('p2');
Route::get('/p3', [OSVEController::class, 'p3'])->name('p3');
Route::get('/p4', [OSVEController::class, 'p4'])->name('p4');
Route::get('/p5', [OSVEController::class, 'p5'])->name('p5');
Route::get('/p6', [OSVEController::class, 'p6'])->name('p6');
Route::get('/p7{token?}', [FormHandlerController::class, 'f7'])->name('p7');
Route::get('/p8', [OSVEController::class, 'p8'])->name('p8');

Route::POST('/f2', [FormHandlerController::class, 'f2'])->name('f2');
Route::POST('/f3', [FormHandlerController::class, 'f3'])->name('f3');
Route::POST('/f4', [FormHandlerController::class, 'f4'])->name('f4');
Route::POST('/f5', [FormHandlerController::class, 'f5'])->name('f5');
Route::POST('/f6', [FormHandlerController::class, 'f6'])->name('f6');
Route::POST('/ics_handler', [ICSController::class, 'ics_handler'])->name('ics_handler');

Route::get('/beheer', [DashboardBeheerController::class, 'redirect']);
Route::get('/beheer/dashboard', [DashboardBeheerController::class, 'index'])->name('dashboard.index');
Route::get('/beheer/json/datatabels/dutch', [DashboardBeheerController::class, 'dtDutch']);

Route::resource('/beheer/users', UsersBeheerController::class);
Route::resource('/beheer/opleidingen', OpleidingBeheerController::class);
Route::resource('/beheer/reglementen', ReglementenBeheerController::class);
Route::resource('/beheer/examens', ExamenBeheerController::class);

Route::resource('/beheer/moments', ExamenMomentBeheerController::class)->except('create', 'store');
Route::get('/beheer/moment/{id}', [ExamenMomentBeheerController::class, 'create'])->name('momentsCreate');
Route::POST('/beheer/moment/{id}', [ExamenMomentBeheerController::class, 'store'])->name('momentsStore');
Route::POST('/beheer/bevestigExamen', [GeplandeExamensBeheerController::class, 'bevestigExamen'])->name('bevestigExamen');

//Delete popup
Route::get('/beheer/user/delete/{id}', [UsersBeheerController::class, 'delete'])->name('usersDelete');
Route::get('/beheer/moment/delete/{id}', [ExamenMomentBeheerController::class, 'delete'])->name('momentsDelete');
Route::get('/beheer/examen/delete/{id}', [ExamenBeheerController::class, 'delete'])->name('examenDelete');
Route::get('/beheer/opleidingen/delete/{id}', [OpleidingBeheerController::class, 'delete'])->name('opleidingDelete');
