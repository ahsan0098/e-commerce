<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class InvoiceComponent extends Component
{

    public function render()
    {
        return view('livewire.invoice-component');
    }
}
