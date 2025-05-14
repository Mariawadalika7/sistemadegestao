<?php
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->prefix('/cliente')->group(function () {
Route::get('/inicio')->name('buyer.home');
});