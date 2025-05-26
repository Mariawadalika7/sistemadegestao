<?php

namespace App\Livewire\Adm;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomerPaymentComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public function render()
    {
        return view('livewire.adm.customer-payment-component');
    }
}
