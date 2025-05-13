 <?php

use App\Livewire\Adm\DashboardComponent;
use App\Livewire\Adm\EmployeeComponent;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('/dashboard')->group( function() {
Route::get('/inicio', DashboardComponent::class)->name('dashboard.admin.home');
Route::get('/funcionarios', EmployeeComponent::class)->name('dashboard.admin.employees');
});