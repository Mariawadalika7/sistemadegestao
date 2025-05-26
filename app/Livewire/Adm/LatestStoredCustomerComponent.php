<?php

namespace App\Livewire\Adm;

use App\Models\{Customer, PersonalData, User};
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class LatestStoredCustomerComponent extends Component
{
    public $uuid,$startdate,$enddate,$customer,$hideInput,$personal_data,$searcher,$status,$users,$user,$employee,$password,$old_password,$fullname,$position,$birthday,$salary,$phone_number,$address,$username,$email;
   
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
            ->confirmButtonText('Fechar')
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
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

        public function edit ($uuid) {
        try {
           
           $this->uuid = $uuid;           
           $this->status = true;
           $this->hideInput = true;
           $this->personal_data = PersonalData::query()->with('customer')->find($this->uuid);          
           $this->user = User::query()->where('customer_uuid',$this->personal_data->customer_uuid)->first();
           $this->customer = Customer::query()->where('uuid',$this->personal_data->customer_uuid)->first();
           $this->old_password =  $this->user->password ?? '';

           $this->fullname =  $this->personal_data->fullname ?? '';
           $this->position = $this->personal_data->employee->position ?? '';
           $this->birthday = $this->personal_data->birthday ?? '';
           $this->salary = $this->personal_data->employee->salary ?? 0;
           $this->phone_number = $this->personal_data->phone_number ?? '';
           $this->address = $this->personal_data->address ?? '';
           $this->username = $this->user->username ?? '';
           $this->email = $this->user->email ?? '';

        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function close_modal() {
        try {
             $this->status = false;
             $this->hideInput = false;
            $this->reset([
                'fullname',
                'address',
                'birthday',
                'phone_number',
                'username',
                'email',
                'password',
            ]);
            $this->resetValidation();
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

        public function update (PersonalData $personal_data_tb, User $user_tb) {
        $this->validate([            
        'fullname' => 'required',
        'birthday' => 'required', 
        'phone_number' => 'required',  
        'address' => 'required',
        'email' => 'required',  
    
        ],[
             'fullname.required' => 'Campo obrigatório*',         
            'birthday.required' => 'Campo obrigatório*',
            'phone_number.required' => 'Campo obrigatório*',
            'address.required' => 'Campo obrigatório*',
            'email.required' => 'Campo obrigatório*',
        ]);

        try {            
              if ($this->birthday >= now()->format('Y')) {
            LivewireAlert::title('ATENÇÃO')
                ->text('A data de nascimento não deve ser igual ou superior a data atual!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
            }else{

            DB::beginTransaction();
            $personal_data_tb::find($this->uuid)->update([
                'fullname' =>$this->fullname ?? '',
                'address' =>$this->address ?? '',
                'birthday' =>$this->birthday ?? '',
                'phone_number' =>$this->phone_number ?? '',
            ]);

            $this->user->update([
                'username' =>$this->username ?? '',
                'email' =>$this->email ?? '',
                'password' =>$this->password ? $this->password : $this->old_password,
            ]);

      

        DB::commit();
        LivewireAlert::title('SUCESSO')
            ->text('Dados atualizados com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();

            }
        
           
        } catch (\Throwable $th) {
        DB::rollBack();
           LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->timer(0)
            ->show();
        }
    }
}
