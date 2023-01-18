<?php

namespace App\Http\Livewire;

use App\Models\category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponenet extends Component
{
    public $sorting = 'default';
    public $size = 12;
    use WithPagination;
    public $search;
    public $product_category;
    public $product_category_id;
    public function mount()
    {
        $this->product_category = 'all categories';
        $this->fill(request()->only('search', 'product_category', 'product_category_id'));
    }
    public function render()
    {

        if ($this->sorting == "new") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_category_id . '%')->orderBy('created_at', 'DESC')->paginate($this->size);
        } else if ($this->sorting == "price_h2l") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_category_id . '%')->orderBy('regular_price', 'DESC')->paginate($this->size);
        } else if ($this->sorting == "price_l2h") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_category_id . '%')->orderBy('regular_price', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "default") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_category_id . '%')->paginate($this->size);
        }
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $categories = category::all();
        return view('livewire.search-componenet', ['products' => $products, 'categories' => $categories, 'popular_products' => $popular_products])->layout('layouts.base');
    }
}
