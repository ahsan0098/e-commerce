<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\homeSlider;

class AdminAddHomeSliderComponent extends Component
{
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public function addslide()
    {
        $slide = new homeSlider();
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        $slide->status = $this->status;
        // $slide->image = $this->image;
        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        // WithFileUploads::saveDomDocument('products', $imagename);
        $this->image->storeAs('slides', $imagename);
        $slide->save();
        session()->flash('message', 'product updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
