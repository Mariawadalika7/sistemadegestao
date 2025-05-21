<?php

namespace App\Livewire\Auth;

use App\Mail\RecoveryPassword;
use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Livewire;

class RecoveryPasswordComponent extends Component
{
    #[Layout('layouts.auth.app')]
    public $isVerified,$isVerifiedEmail,$recovery_code,$user;

    #[Validate('required', message: 'Campo obrigatório*')]
    public $email;   

    protected $listeners = ['closeSweetAlert'];

    public function mount () {
        try{
            $this->isVerified = true;
        }catch(Exception $ex){

        }
    }
    public function render()
    {
        return view('livewire.auth.recovery-password-component', []);
    }

    public function recoverPassword (User $user_table) {
        $this->validate();
        try {
             $this->user = $user_table::query()->where("email", $this->email)->first();
            if(!$this->user) {
                LivewireAlert::title('ATENÇÃO')
                  ->warning()
                  ->text('Não existe nenhuma conta associada a este email!')
                  ->position('center')
                  ->withConfirmButton()
                  ->confirmButtonText('Fechar')   
                  ->onConfirm('closeSweetAlert')              
                  ->show();                        

            }else{
               $this->isVerified = true;
               $this->isVerifiedEmail = $this->email;
               $this->recovery_code = rand(1,1000);
               DB::beginTransaction();
                $this->user::query()->where("email", $this->isVerifiedEmail)
                ->update([
                    "reset_password_code" => $this->recovery_code
                ]);
                DB::commit();
                Mail::to($this->email)->send(new RecoveryPassword($this->recovery_code));
                
                LivewireAlert::title('SUCESSO')
                  ->success()
                  ->text('Foi-lhe enviado o código para recuperação da sua senha, consulte o seu email!')
                  ->position('center')
                  ->confirmButtonText('Fechar')
                  ->timer('300000')
                  ->show();                  
             
            }
        } catch (Exception $ex) {
         LivewireAlert::title('Erro')
            ->text('erro: ' .$ex->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function closeSweetAlert () {
        try {
            
        } catch (Exception $ex) {
          LivewireAlert::title('Erro')
            ->text('erro: ' .$ex->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }
}
