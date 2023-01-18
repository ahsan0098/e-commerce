<?php

namespace App\Http\Livewire\Admin;

use App\Models\category;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addcategory()
    {

        if ($this->name != "" && $this->slug != "") {
            $category = new category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
            session()->flash('message', 'Category added successfully!');
        } else {
            if ($this->name == "") {
                session()->flash('nameerr', "Name field can't be empty");
            }
            if ($this->slug == "") {
                session()->flash('slugerr', "Slug field can't be empty");
            }
        }
    }
    public function render()
    {
        return view('livewire.admin.add-category-component')->layout('layouts.base');
    }
}
