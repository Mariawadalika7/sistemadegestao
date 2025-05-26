<?php

namespace App\Livewire\Auth;

use App\Models\Customer;
use App\Models\PersonalData;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class SignUpComponent extends Component
{
    
    #[Layout('layouts.home.app')] 
   public $fullname,$birthday,$phone_number,$email,$address,$password,$password_confirmation,$customer,$customerRole;
   protected $rules = ['fullname' =>'required', 'birthday' =>'required', 'phone_number' =>'required', 'email' =>'required|unique:users', 'address' =>'required', 'password' =>'required', 'password_confirmation' =>'required|same:password'];
   protected $messages = ['fullname.required' =>'Campo obrigatório', 'birthday.required' =>'Campo obrigatório' ,'phone_number.required' =>'Campo obrigatório', 'email.required' =>'Campo obrigatório', 'email.unique' =>'O email já existe', 'address.required' =>'Campo obrigatório', 'password.required' =>'Campo obrigatório', 'password_confirmation.required' =>'Campo obrigatório', 'password_confirmation.same' =>'O campo senha e confirmar devem corresponder'];

   public function mount () {
    $this->customerRole = Role::query()->where('role_type', 'customer')->first();
   }


    public function render()
    {
        return view('livewire.auth.sign-up-component');
    }

    public function sign_up (User $user_tb, Customer $customer_tb, PersonalData $personal_data_tb) {       
        $this->validate();
        DB::begintransaction();
        
        try {
             if ($this->birthday >= now()->format('Y') ) {
             LivewireAlert::title('ATENÇÃO')
                ->text('A data de nascimento não deve ser igual ou superior a data atual!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
            }else{

            $this->customer = $customer_tb->create([]);           
        
            $personal_data_tb::create([
                'fullname' =>$this->fullname,
                'address' =>$this->address,
                'birthday' =>$this->birthday,
                'phone_number' =>$this->phone_number,
                'customer_uuid' =>$this->customer->uuid
            ]);

            $user_tb->create([
                'email' =>$this->email,
                'password' =>Hash::make($this->password),
                'role_uuid' =>$this->customerRole->uuid,
                'customer_uuid' =>$this->customer->uuid
            ]); 
            DB::commit();

            LivewireAlert::title('SUCESSO')
            ->html("<div>A sua conta foi criada com sucesso, <a href='/login'>clique aqui</a> para efectuar o login.</div>")
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer(0)
            ->show();            
        }
          

        } catch (\Throwable $th) {
         DB::rollBack();
         LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function cleanTextFields () {
        try {
         $this->reset(['fullname' ,'address','birthday', 'phone_number', 'email', 'password']);
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
}
