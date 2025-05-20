<?php

namespace App\Livewire\Auth;

use Exception;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RecoveryPasswordComponent extends Component
{
    #[Layout('layouts.auth.app')]
    public $isVerified;
    
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
}
