<?php

namespace App\Http\Livewire;

use App\Models\category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
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
