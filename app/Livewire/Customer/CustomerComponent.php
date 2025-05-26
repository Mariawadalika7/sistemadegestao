<?php

namespace App\Livewire\Customer;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomerComponent extends Component
{
    #[Layout('layouts.customer.app')] 
    public function render()
    {
        return view('livewire.customer.customer-component');
    }
}
