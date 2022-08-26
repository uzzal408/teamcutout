<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class Slider extends Component
{
    public $sliders = [];
    public function mount(){
        $slide = \App\Models\Slider::where('status',1)
            ->orderBy('sorting','asc')->get();
        if($slide){
            $this->sliders = $slide->toArray();
        }
    }
    public function render()
    {
        return view('livewire.inc.slider');
    }
}
