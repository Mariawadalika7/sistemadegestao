 <?php

use App\Livewire\Auth\AuthComponent;
use Illuminate\Support\Facades\Route;



 Route::get("/login", AuthComponent::class)->name('login');