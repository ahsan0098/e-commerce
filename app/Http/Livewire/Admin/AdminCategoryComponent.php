<?php

namespace App\Http\Livewire\Admin;

use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deletecategory($id)
    {
        $cat = category::find($id);
        $cat->delete();
        session()->flash('message', 'Category has been deleted');
    }
    public function render()
    {

        $categories = category::paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
