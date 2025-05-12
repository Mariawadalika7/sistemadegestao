 <?php

use App\Livewire\Adm\DashboardComponent;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('/dashboard')->group( function() {
Route::get('/inicio', DashboardComponent::class)->name('dashboard.admin.home');
 });