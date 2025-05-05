<?php

namespace App\Livewire\Adm;

use App\Models\{PersonalData};
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;

class DashboardComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    protected $listeners = ['confirmLogout'];
    public function render()
    {
        return view('livewire.adm.dashboard-component',[
            'user' =>$this->getAuthUserInfo()
        ]);
    }

    public function getAuthUserInfo () {
        try {
           return PersonalData::where('employee_uuid', auth()->user()->employee_uuid)->first();
        } catch (\Throwable $th) {
           LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
     
    }

       public function logout () {
            try {
                LivewireAlert::title('Atenção')
            ->text('Deseja realmente, terminar sessão?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancelar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmLogout')
            ->show();

            } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Close')
                ->show();
            }
        }

        public function confirmLogout () {
        try {
           auth()->logout();
           return redirect()->route('login');
        } catch (Throwable $th) {
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
    }
}
