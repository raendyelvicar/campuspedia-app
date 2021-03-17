<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'view'])->name('contact.view');
Route::get('/contact/{id}', [ContactController::class, 'get_contact'])->name('contact.getById');
Route::post('/contact', [ContactController::class, 'add_contact'])->name('contact.add');
Route::post('/contact/{id}/edit', [ContactController::class, 'update_contact'])->name('contact.update');
Route::post('/contact/{id}', [ContactController::class, 'delete_contact'])->name('contact.delete');
