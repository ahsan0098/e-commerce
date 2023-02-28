<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public $incerease;
    public $decerase;
    public function addQuntity($rowid)
    {
        $product = Cart::get($rowid);
        $qty = $product->qty + 1;
        Cart::update($rowid, $qty);
    }
    public function reduceQuntity($rowid)
    {
        $product = Cart::get($rowid);
        $qty = $product->qty - 1;
        Cart::update($rowid, $qty);
    }
    public function deleteFromCart($rowid)
    {
        Cart::remove($rowid);
        session()->flash('success_message', "Item removed from cart");
    }
    public function deleteAll()
    {
        Cart::destroy();
    }
    public function gotostripe($total)
    {
        if (Auth::check()) {
            session()->put('amount', $total);
            return redirect('/checkout');
        } else {
            $this->dispatchBrowserEvent('swal:message', [
                'text' => "Please login first"
            ]);
        }
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
