<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $products = Product::where('category_id', $product->category_id)->inRandomOrder()->get();
        return view('livewire.details-component', ['product' => $product, 'products' => $products, 'popular_products' => $popular_products])->layout("layouts.base");
    }
}
