<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomepageController;
use App\Http\Controllers\Pages\MemesController;
use App\Http\Controllers\Pages\ChartController;

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

Route::get('/', HomepageController::class)->name('home');

Route::get('/about', AboutController::class)->name('about');

Route::get('/memes', MemesController::class)->name('memes');

Route::get('/chart', ChartController::class)->name('chart');
