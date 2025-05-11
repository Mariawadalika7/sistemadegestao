<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class HomeComponent extends Component
{
    #[Layout('layouts.home.app')] 

    public function render()
    {
        return view('livewire.home.home-component');
    }
}
