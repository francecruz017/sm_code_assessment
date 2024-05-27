<?php

use App\Http\Controllers\IndependentPagesController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('pages/multiplication-table');
});

Route::get('/odd-even', [IndependentPagesController::class, 'oddEvenCheckerPage'])->name('oddEven');
Route::get('/hole-counter', [IndependentPagesController::class, 'numberHoleCounterPage'])->name('numberHoleCounter');
Route::get('/leap-year-checker', [IndependentPagesController::class, 'leapYearCheckerPage'])->name('leapYearChecker');

Route::resource('/users', UserController::class)->except('show');
