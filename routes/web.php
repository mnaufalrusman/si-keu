<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OfficerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/');

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/officer', OfficerController::class)->except('show');
    Route::resource('/income', IncomeController::class)->except('show');
    Route::resource('/expense', ExpenseController::class)->except('show');
    Route::resource('/note', NoteController::class)->except('show');
    Route::get('/report', [DashboardController::class, 'index'])->name('report');
    Route::get('/report', function () {
        return view('report', [
            'title' => 'Laporan'
        ]);
    });
    Route::get('/profile', function () {
        return view('profile', [
            'title' => 'Profil'
        ]);
    });
});
