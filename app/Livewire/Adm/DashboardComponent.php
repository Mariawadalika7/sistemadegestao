<?php

namespace App\Livewire\Adm;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;

class DashboardComponent extends Component
{
    #[Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.adm.dashboard-component',[]);
    } 

}
