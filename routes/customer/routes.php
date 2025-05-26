<?php

use App\Livewire\Customer\CustomerComponent;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->prefix('/cliente')->group(function () {
Route::get('/inicio', CustomerComponent::class)->name('dashboard.customer.home');
});