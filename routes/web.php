<?php

use App\Http\Controllers\BillPerMonthReport;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ExpenseReportController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/application/add', [ApplicationController::class, 'applicationAdd'])->name('application.add');
    Route::post('/application/store', [ApplicationController::class, 'applicationStore'])->name('application.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/print/{bill}', PrintController::class)->name('print');
    Route::get('/receipt/{payment}', ReceiptController::class)->name('receipt');
    Route::get('/billpermonth/{month}', BillPerMonthReport::class)->name('billpermonth');
    Route::get('/expensereport/{month}', ExpenseReportController::class)->name('expensereport');
});


require __DIR__ . '/auth.php';
