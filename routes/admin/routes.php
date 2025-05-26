 <?php

use App\Http\Middleware\OnlyAdminAccess;
use App\Http\Middleware\OnlyAdminAndEmployeeAccess;
use App\Livewire\Adm\CustomerPaymentComponent;
use App\Livewire\Adm\DashboardComponent;
use App\Livewire\Adm\EmployeeComponent;
use App\Livewire\Adm\EnterpriseComponent;
use App\Livewire\Adm\EnterpriseServiceComponent;
use App\Livewire\Adm\RoleComponent;
use Illuminate\Support\Facades\Route;



Route::middleware([OnlyAdminAndEmployeeAccess::class])->prefix('/dashboard')->group( function() {
Route::get('/inicio', DashboardComponent::class)->name('dashboard.admin.home');
Route::get('/funcionarios', EmployeeComponent::class)->name('dashboard.admin.employees');
Route::get('/servicos/empresa/', EnterpriseServiceComponent::class)->name('dashboard.admin.enterprise.services');
Route::get('/pagamento/clientes', CustomerPaymentComponent::class)->name('dashboard.admin.customer.payments');
Route::middleware([OnlyAdminAccess::class])->group( function() {
Route::get('/roles', RoleComponent::class)->name('dashboard.admin.roles');
Route::get('/dados/empresa/', EnterpriseComponent::class)->name('dashboard.admin.enterprise');
});  
});