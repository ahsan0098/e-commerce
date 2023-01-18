<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;
    public $product;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $description;
    public $short_description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $featured;
    public $quantity;
    public $SKU;
    public $category;
    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->slug = $this->product->slug;
        $this->regular_price = $this->product->regular_price;
        $this->description = $this->product->description;
        $this->short_description = $this->product->short_description;
        $this->stock_status = $this->product->stock_status;
        $this->category = $this->product->category_id;
        $this->sale_price = $this->product->sale_price;
        $this->quantity = $this->product->quantity;
        $this->featured = $this->product->feature;
        // $this->product->SKU = Str::replace('DIGI', '', $this->product->SKU)->trim($this->product->SKU);
        $this->SKU = $this->product->SKU;
        $this->image = $this->product->image;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function editproduct()
    {

        $this->product->name = $this->name;
        $this->product->slug = $this->slug;
        $this->product->regular_price = $this->regular_price;
        $this->product->description = $this->description;
        $this->product->short_description = $this->short_description;
        $this->product->stock_status = $this->stock_status;
        $this->product->category_id = $this->category;
        $this->product->sale_price = $this->sale_price;
        $this->product->quantity = $this->quantity;
        $this->product->feature = $this->featured;
        $this->product->SKU = 'DIGI' . $this->SKU;
        if ($this->newimage) {
            $imagename = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            // WithFileUploads::saveDomDocument('products', $imagename);
            $this->newimage->storeAs('products', $imagename);
            $this->product->image = $imagename;
            $this->image = $imagename;
        }
        $this->product->save();

        session()->flash('message', 'product updated successfully!');
        // $products = Product::paginate(10);
        // return redirect('admin.products', ['products' => $products]);
    }
    public function render()
    {

        $categories = category::all();
        return view('livewire.admin.edit-product-component', ['categories' => $categories, 'image' => $this->image])->layout('layouts.base');
    }
}
