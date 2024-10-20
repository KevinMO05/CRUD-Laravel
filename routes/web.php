<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosterController;

Route::get('/', [PosterController::class, 'index'])->name('posters.main');

Route::get('/create-poster', [PosterController::class, 'create'])->name('posters.create');

Route::post('/store', [PosterController::class, 'store'])->name('posters.store');

Route::get('/posters/{id}/edit', [PosterController::class, 'edit'])->name('posters.edit');

Route::put('/posters/{id}', [PosterController::class, 'update'])->name('posters.update');

Route::delete('/posters/{id}', [PosterController::class, 'destroy'])->name('posters.destroy');

