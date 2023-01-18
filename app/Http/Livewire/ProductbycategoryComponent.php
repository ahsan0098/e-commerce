<?php

namespace App\Http\Livewire;

use App\Models\category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductbycategoryComponent extends Component
{
    public $sorting = 'default';
    public $size = 12;
    public $slug;
    use WithPagination;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {

        $categories_by = category::where('slug', $this->slug)->first();
        $cat_id = $categories_by->id;
        $cat_name = $categories_by->name;
        if ($this->sorting == "new") {
            $products = Product::where('category_id', $cat_id)->orderBy('created_at', 'DESC')->paginate($this->size);
        } else if ($this->sorting == "price_h2l") {
            $products = Product::where('category_id', $cat_id)->orderBy('regular_price', 'DESC')->paginate($this->size);
        } else if ($this->sorting == "price_l2h") {
            $products = Product::where('category_id', $cat_id)->orderBy('regular_price', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "default") {
            $products = Product::where('category_id', $cat_id)->paginate($this->size);
        }
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $categories = category::all();
        return view('livewire.productbycategory-component', ['products' => $products, 'categories' => $categories, 'popular_products' => $popular_products, 'category_name' => $cat_name])->layout('layouts.base');
    }
}
