<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('category')
    ->name('category')
    ->middleware("auth")
    ->controller(Controllers\CategoryController::class)
    ->group(function () {
        Route::get('/', 'getAll')->name('.all');
        Route::get('/create', 'create')->name('.create');
        Route::post('/store', 'store')->name('.store');
        Route::get('/excel', 'excel')->name('.excel');
        Route::post('/import', 'import')->name('.import');
        Route::patch('/update/{category}', 'update')->name('.update');
        Route::get('/{category}/show/', 'edit')->name('.show');
        Route::post('/delete/{category}', 'delete')->name('.delete');
        Route::post('/deleteSelected', 'deleteSelected')->name('.deleteSelected');
});

Route::prefix('email')
    ->name('email')
    ->middleware("auth")
    ->controller(controllers\EmailController::class)
    ->group(function () {
        Route::get('/', 'getAll')->name('.all');
        Route::get('/create', 'create')->name('.create');
        Route::post('/store', 'store')->name('.store');
        Route::get('/excel', 'excel')->name('.excel');
        Route::post('/import', 'import')->name('.import');
        Route::patch('/update/{email}', 'update')->name('.update');
        Route::get('/{email}/show/', 'edit')->name('.show');
        Route::post('/delete/{email}', 'delete')->name('.delete');
        Route::post('/deleteSelected', 'deleteSelected')->name('.deleteSelected');
});

Route::prefix('message')
    ->name('message.')
    ->middleware("auth")
    ->controller(controllers\MessageController::class)
    ->group(function () {
        Route::get('/', 'getAll')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::patch('/update/{message}', 'update')->name('update');
        Route::get('/{message}/show/', 'edit')->name('show');
        Route::post('/delete/{message}', 'delete')->name('delete');
});


Route::prefix('mail')
    ->name('mail')
    ->middleware("auth")
    ->controller(controllers\SentEmailController::class)
    ->group(function () {
        Route::post('/', 'sendEmail')->name('.send');
        Route::post('/history', 'sendEmail')->name('.history');
    });