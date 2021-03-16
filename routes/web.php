<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/news', [NewsController::class, 'view'])->name('news.view');
Route::post('/news', [NewsController::class, 'store'])->name('news.create');
Route::put('/news/{id}/edit', [NewsController::class, 'update'])->name('news.update');
Route::get('/news/{id}', [NewsController::class, 'getById'])->name('news.getById');
Route::post('/news/{id}', [NewsController::class, 'delete'])->name('news.delete');
