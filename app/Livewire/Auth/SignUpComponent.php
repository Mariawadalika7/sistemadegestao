<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SignUpComponent extends Component
{
    
   #[Layout('layouts.auth.app')] 
    public function render()
    {
        return view('livewire.auth.sign-up-component');
    }
}
