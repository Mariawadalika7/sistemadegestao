<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class SignUpComponent extends Component
{
    
   #[Layout('layouts.auth.app')] 
   public $fullname,$birthday,$phone_number,$email,$address,$password,$password_confirmation;
   protected $rules = ['fullname' =>'required', 'birthday' =>'required', 'phone_number' =>'required', 'email' =>'required|unique:users', 'address' =>'required', 'password' =>'required', 'password_confirmation' =>'required|same:password'];
   protected $messages = ['fullname.required' =>'Campo obrigatório', 'birthday.required' =>'Campo obrigatório' ,'phone_number.required' =>'Campo obrigatório', 'email.required' =>'Campo obrigatório', 'email.unique' =>'O email já existe', 'address.required' =>'Campo obrigatório', 'password.required' =>'Campo obrigatório', 'password_confirmation.required' =>'Campo obrigatório', 'password_confirmation.same' =>'O campo senha e confirmar devem corresponder'];

    public function render()
    {
        return view('livewire.auth.sign-up-component');
    }

    public function sign_up () {
        $this->validate();
        try {
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
