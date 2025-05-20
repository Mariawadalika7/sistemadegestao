 <?php

use \App\Livewire\Home\HomeComponent;
use \Illuminate\Support\Facades\Route;

  
Route::get("/", HomeComponent::class)->name('home_page.multiservice.site');
