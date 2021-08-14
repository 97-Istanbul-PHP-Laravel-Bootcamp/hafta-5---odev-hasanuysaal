<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\ZoneController;
use App\Http\Controllers\admin\LocationController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('.login-page');
    Route::post('/login', [LoginController::class, 'login'])->name('.login');

    // Need Auth
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('.index');
        Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');

        // Partners
        Route::get('/partner' , [PartnerController::class , 'index'])->name('.partner');
        Route::get('/partner/edit' , [PartnerController::class , 'edit'])->name('.partner.edit');
        Route::get('/partner/delete' , [PartnerController::class , 'delete'])->name('.partner.delete');
        Route::post('/partner/save' , [PartnerController::class , 'save'])->name('.partner.save');

        // Zone and Locations
        Route::get('/zone', [ZoneController::class,'index'])->name('.zone');
        Route::get('/zone/edit', [ZoneController::class,'edit'])->name('.zone.edit');
        Route::post('/zone/save', [ZoneController::class,'save'])->name('.zone.save');

        Route::get('/location/edit', [LocationController::class,'edit'])->name('.location.edit');
        Route::post('/location/save', [LocationController::class,'save'])->name('.location.save');
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
