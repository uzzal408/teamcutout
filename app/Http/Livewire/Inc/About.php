<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class About extends Component
{
    public $abouts = [];
    public function mount(){
        $ab = \App\Models\About::where('status',1)->orderBy('sorting','asc')->get();
        if($ab){
            $this->abouts = $ab->toArray();
        }
    }
    public function render()
    {
        return view('livewire.inc.about');
    }
}
