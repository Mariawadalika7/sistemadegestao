<?php

namespace App\Livewire\Buyer;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BuyerComponent extends Component
{
    #[Layout('layouts.home.app')] 

    public function render()
    {
        return view('livewire.buyer.buyer-component');
    }
}
