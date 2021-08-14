<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PartnerController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('.login-page');
    Route::post('/login', [LoginController::class, 'login'])->name('.login');

    // Need Auth
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('.index');
        Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');

        Route::get('/partner' , [PartnerController::class , 'index'])->name('.partner');
        Route::get('/partner/edit' , [PartnerController::class , 'edit'])->name('.partner.edit');
        Route::get('/partner/delete' , [PartnerController::class , 'delete'])->name('.partner.delete');
        Route::post('/partner/save' , [PartnerController::class , 'save'])->name('.partner.save');
    });

});

Route::name('site')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return 'website';
        });
    });

    Route::get('/login', function () {
    })->name('.login-page');
});
