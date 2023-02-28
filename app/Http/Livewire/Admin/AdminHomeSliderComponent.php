<?php

namespace App\Http\Livewire\Admin;

use App\Models\homeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteslide($slideid)
    {
        $slide = homeSlider::find($slideid);
        $slide->delete();
        // back();
    }
    public function render()
    {
        $slides = homeSlider::paginate(5);
        return view('livewire.admin.admin-home-slider-component', ['slides' => $slides])->layout('layouts.base');
    }
}
