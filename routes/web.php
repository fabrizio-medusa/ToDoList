<?php

use App\Livewire\Counter;
use App\Http\Controllers\LogicBase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

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


Route::get('/', [LogicBase::class, 'home'])->name('homepage');

Route::get('/contatti', [ContactController::class, 'form'])->name('contacts.form');
Route::post('/contatti/send', [ContactController::class, 'send'])->name('contacts.send');

Route::get('/counter', Counter::class);

Route::get('/users', function () {
    return view('users');
});
    
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
    
    Route::get('/todo', function () {
        return view('todo');
    })->name('todo');
});




