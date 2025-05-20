 <?php

use App\Livewire\Auth\AuthComponent;
use App\Livewire\Auth\RecoveryPasswordComponent;
use App\Livewire\Auth\SignUpComponent;
use Illuminate\Support\Facades\Route;


Route::prefix('/utilizador')->group(function () { 
Route::get("/login", AuthComponent::class)->name('login');
Route::get('/criar/conta/', SignUpComponent::class)->name('user.sign.up');
Route::get('/recuperar-senha', RecoveryPasswordComponent::class)->name('user.recover.password');

});