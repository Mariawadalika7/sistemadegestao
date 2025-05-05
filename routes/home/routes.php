 <?php

use App\Livewire\Auth\AuthComponent;
use App\Livewire\Home\HomeComponent;
use Illuminate\Support\Facades\Route;

 
 
 Route::get("/", AuthComponent::class);
 //Route::get("/", HomeComponent::class);
