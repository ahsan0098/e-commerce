<?php

namespace App\Http\Livewire\Admin;

use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class AddProductComponent extends Component
{
    use WithPagination;
    public $name;
    public $slug;
    public $image;
    public $description;
    public $short_description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $featured;
    public $quantity;
    public $SKU;
    public $category;
    public function mount()
    {
        $this->stock_status = 'Instock';
        $this->featured = 0;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addproduct()
    {

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->description = $this->description;
        $product->short_description = $this->short_description;
        $product->stock_status = $this->stock_status;
        $product->category_id = $this->category;
        $product->sale_price = $this->sale_price;
        $product->quantity = $this->quantity;
        $product->feature = $this->featured;
        $product->SKU = 'DIGI' . $this->SKU;
        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        WithFileUploads::saveDomDocument('products', $imagename);
        $this->image->storeAs('products', $imagename);
        $product->image = $imagename;
        $product->save();

        session()->flash('message', 'product added successfully!');
    }
    public function render()
    {
        $categories = category::all();
        return view('livewire.admin.add-product-component', ['categories' => $categories, 'image' => $this->image])->layout('layouts.base');
    }
}
