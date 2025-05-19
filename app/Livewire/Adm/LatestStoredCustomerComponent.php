<?php

namespace App\Livewire\Adm;

use App\Models\{PersonalData, User};
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class LatestStoredCustomerComponent extends Component
{
    public $startdate,$enddate,$searcher,$users;

    
    public function mount (User $all_users_tb) {
        try {
            $this->users = $all_users_tb::query()->with('role')
            ->whereHas('role', function ($q) {
            $q->where('role_type', 'customer');
        })->get();

        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }  
   }


    public function render()
    {
        return view('livewire.adm.latest-stored-customer-component',[
            'latest_stored_customers' =>$this->getLatestAddedCustomers()
        ]);
    }

    public function getLatestAddedCustomers () {
        try {
            if ($this->searcher) {
                if (isset($this->users) && $this->users->count() > 0) {
                    foreach ($this->users as $only_customer) {
                     return PersonalData::query()->with('customer')                    
                        ->where('fullname', 'like', '%' . $this->searcher . '%')
                        ->whereNull('employee_uuid')
                        ->where('customer_uuid', $only_customer->customer_uuid)                        
                        ->latest()
                        ->get();
                    }
    
                }

            }else if ($this->startdate && $this->enddate){
                if (isset($this->users) && $this->users->count() > 0) {
                    foreach ($this->users as $only_customer) {
                        return PersonalData::query()->with('customer')
                        ->whereNull('employee_uuid')
                        ->where('customer_uuid', $only_customer->customer_uuid)
                        ->whereBetween('created_at',[$this->startdate,$this->enddate])
                        ->latest()
                        ->get();
                    }
                }
    
            }else{
                if (isset($this->users) && $this->users->count() > 0) {
                    foreach ($this->users as $only_customer) {
                        return PersonalData::query()->with('customer')
                        ->whereNull('employee_uuid')
                        ->where('customer_uuid', $only_customer->customer_uuid)
                        ->latest()
                        ->get();
                    }
                }    

            }

        } catch (\Throwable $th) {
         LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }
}
