<?php

namespace App\Livewire\Adm;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DashboardComponent extends Component
{
    #[Layout('layouts.admin.app')] 

    public function render()
    {
        return view('livewire.adm.dashboard-component');
    }
}
