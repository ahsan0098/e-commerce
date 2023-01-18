<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Database\Factories\CategoryFactory;

class EditCategoryComponent extends Component
{
    public $cat_id;
    public $name;
    public $slug;
    public function mount($id)
    {
        $category = category::where('id', $id)->first();
        $this->id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function editcategory()
    {

        if ($this->name != "" && $this->slug != "") {
            $category = category::find($this->id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
            session()->flash('message', 'Category Updated successfully!');
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
        return view('livewire.admin.edit-category-component')->layout('layouts.base');
    }
}
