<?php

namespace App\Livewire\Adm;

use App\Models\{PersonalData};
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardComponent extends Component
{
    #[Layout('layouts.admin.app')] 

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
}
