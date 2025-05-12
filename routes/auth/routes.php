 <?php

use App\Livewire\Auth\AuthComponent;
use App\Livewire\Auth\SignUpComponent;
use Illuminate\Support\Facades\Route;


Route::get("/login", AuthComponent::class)->name('login');
Route::get('/cliente/criar/conta/', SignUpComponent::class)->name('user.sign.up');