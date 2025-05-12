<?php

namespace App\Livewire\Auth;

use App\Models\{User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AuthComponent extends Component
{
    #[Layout('layouts.auth.app')] 
    #[Validate('required', message: 'Campo obritório*')]
    public $email;

    #[Validate('required', message: 'Campo obritório*')]
    public $password;

    public $user,$credentials,$phone_number;

    public function render()
    {
        return view('livewire.auth.auth-component');
    }

    public function signIn (User $user_table) {
        dd();
        $this->validate();
        try {
           
            $this->credentials = ["email" =>$this->email, "password" =>$this->password];
            $this->user = $user_table->query()->where('email', $this->email)->first();

            if (auth()->attempt($this->credentials) and !is_null($this->user)) {

                if (auth()->user()->role->rolename == 'customer') {
                       return redirect()->route('buyer.home'); 
                    }else if (auth()->user()->role->rolename == 'admin') {
                        return redirect()->route('dashboard.admin.home');  
                    }else if (auth()->user()->role->rolename == 'employee') {
                        return redirect()->route('dashboard.admin.home');                          
                }
            }else{
            LivewireAlert::title('Atenção')
                ->text('Credenciais incorretas,tente novamente!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Close')
                 ->show();
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
