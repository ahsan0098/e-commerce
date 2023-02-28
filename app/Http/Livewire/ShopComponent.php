<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    public function store($p_id, $p_name = "abc", $p_price = "123")
    {
        Cart::add($p_id, $p_name, 1, $p_price)->associate('App\models\Product');
        session()->flash('success_message', 'item added in cart');
        return redirect()->route('product.cart');
    }

    public $sorting = 'default';
    public $size = 12;
    use WithPagination;
    public function render()
    {
        if ($this->sorting == "new") {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->size);
        } else if ($this->sorting == "price_h2l") {
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->size);
        } else if ($this->sorting == "price_l2h") {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "default") {
            $products = Product::paginate($this->size);
        }
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $categories = category::all();
        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories, 'popular_products' => $popular_products])->layout('layouts.base');
    }
}
