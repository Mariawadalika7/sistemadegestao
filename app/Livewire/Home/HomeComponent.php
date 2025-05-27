<?php

namespace App\Livewire\Home;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomeComponent extends Component
{
    
    #[Layout('layouts.home.app')] 
    public function render()
    {
        return view('livewire.home.home-component')->layout('layouts.home.app');
    }
}
