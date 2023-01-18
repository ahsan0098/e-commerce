<?php

namespace App\Http\Livewire;

use App\Models\category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
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
        $categories = category::all();
        return view('livewire.header-search-component', ['cat_s' => $categories])->layout('layouts.base');
    }
}
