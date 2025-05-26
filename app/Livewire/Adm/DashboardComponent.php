<?php

namespace App\Livewire\Adm;

use App\Models\{Payment, User,Role};
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;

class DashboardComponent extends Component
{
    #[Layout('layouts.admin.app')]
    public string $customer_role_uuid,$status;
    public int $active_customers_counter;

    public function mount(Role $role_tb) {
        try {
            $this->customer_role_uuid = $role_tb::query()->where('role_type', 'customer')
            ->select(['uuid'])
            ->pluck('uuid')
            ->first();

        } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function render()
    {
        return view('livewire.adm.dashboard-component',[
            'customersCounter' =>$this->getActiveCustomerCounter(),
            'paymentsCounter' =>$this->getProccededPayments(), 'reportCounter' =>$this->getPaymentReportGeneratedCounter()
        ]);
    } 

    public function getActiveCustomerCounter () {
        try {            
            return User::query()->where('role_uuid',$this->customer_role_uuid)->count();
        } catch (Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function getProccededPayments () {
        try {
           return Payment::query()->count();
        } catch (Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }


       public function getPaymentReportGeneratedCounter () {
        try {
           return Payment::query()->select('payment_report_generated_counter')->sum('payment_report_generated_counter');
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
       }

}

}

