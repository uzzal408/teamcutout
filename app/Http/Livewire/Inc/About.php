<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class About extends Component
{
    public $abouts = [];
    public $title;
    public $desc;
    public function mount(){
        $ab = \App\Models\About::where('status',1)->orderBy('sorting','asc')->get();
        if($ab){
            $this->abouts = $ab->toArray();
        }
        $this->title = config('settings.about_page_title');
        $this->desc = config('settings.about_page');
    }
    public function render()
    {
        return view('livewire.inc.about');
    }
}
