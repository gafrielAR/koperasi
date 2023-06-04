<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SavingController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\InstallmentController;

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
    return view('auth.login');
});

Auth::routes();

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/saving-chart', [AdminController::class, 'savingChart'])->name('saving.chart');

    Route::name('member.')->prefix('member')->group(function () {
        Route::get('/', [MemberController::class, 'list'])->name('list');
        Route::get('/{id}', [MemberController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [MemberController::class, 'edit'])->name('edit');
        Route::post('/create', [MemberController::class, 'create'])->name('create');
        Route::post('/update/{id}', [MemberController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [MemberController::class, 'delete'])->name('delete');
    });

    Route::name('saving.')->prefix('saving')->group(function () {
        Route::get('/', [SavingController::class, 'list'])->name('list');
        Route::get('/{id}/edit', [SavingController::class, 'edit'])->name('edit');
        Route::post('/create', [SavingController::class, 'create'])->name('create');
        Route::post('/update/{id}', [SavingController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [SavingController::class, 'delete'])->name('delete');
    });

    Route::name('loan.')->prefix('loan')->group(function () {
        Route::get('/', [LoanController::class, 'list'])->name('list');
        Route::get('/{id}/edit', [LoanController::class, 'edit'])->name('edit');
        Route::get('/{id}/read', [LoanController::class, 'read'])->name('read');
        Route::post('/create', [LoanController::class, 'create'])->name('create');
        Route::post('/update/{id}', [LoanController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [LoanController::class, 'delete'])->name('delete');
    });

    Route::name('installment.')->prefix('installment')->group(function () {
        Route::get('/', [InstallmentController::class, 'list'])->name('list');
        Route::get('/{id}/edit', [InstallmentController::class, 'edit'])->name('edit');
        Route::get('/{id}/read', [InstallmentController::class, 'read'])->name('read');
        Route::post('/create', [InstallmentController::class, 'create'])->name('create');
        Route::post('/api/loan', [InstallmentController::class, 'api_loan'])->name('api_loan');
        Route::post('/update/{id}', [InstallmentController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [InstallmentController::class, 'delete'])->name('delete');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
