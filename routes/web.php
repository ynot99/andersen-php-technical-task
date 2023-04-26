<?php

use App\Http\Controllers\AndersenTaskController;
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

Route::get('/', [AndersenTaskController::class, 'show'])
    ->name('andersen-tasks.show');

Route::post('/andersen-tasks', [AndersenTaskController::class, 'store'])
    ->name('andersen-tasks.store');
