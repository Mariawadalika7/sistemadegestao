<?php

namespace App\Livewire\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AuthComponent extends Component
{
    #[Layout('layouts.auth.app')] 
    

    public function render()
    {
        return view('livewire.auth.auth-component');
    }
}
