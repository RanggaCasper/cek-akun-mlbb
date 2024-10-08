<?php

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

Route::get('/', App\Livewire\CekMLBB::class)->name('index');
Route::get('/docs', App\Livewire\Docs::class)->name('docs');
Route::get('/calculator', App\Livewire\Calculator::class)->name('calculator');