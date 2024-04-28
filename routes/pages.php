<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/c', function () {
    return view("pages.components");
})->name('/c');