<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

Route::get('/promotion/home', [PromotionController::class, 'index'])->name('home');

// function ini hanya dipakai untuk redirect ke halaman home saat pertama kali server di start
Route::get('/', function () {
    return redirect('/promotion/home');
});



Route::get('/promotion/{action}/{id?}', [PromotionController::class, 'show'])->name('promotion');

Route::post('/promotion/add', [PromotionController::class, 'create'])->name('promotion.create');

Route::post('/promotion/edit', [PromotionController::class, 'update'])->name('promotion.edit');

Route::delete('/promotion/delete/{promotion}', [PromotionController::class, 'destroy'])->name('promotion.destroy');
