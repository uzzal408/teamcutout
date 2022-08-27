<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class Portfolio extends Component
{
    public $satisfied_client = 0;
    public $total_file       = 0;
    public $total_project    = 0;
    public $bg_image;
    public function mount(){
        $this->satisfied_client = config('settings.satisfied_client');
        $this->total_file = config('settings.total_file');
        $this->total_project = config('settings.total_project');
        $this->bg_image = 'storage/'.config('settings.counter_image');
    }
    public function render()
    {
        return view('livewire.inc.portfolio');
    }
}
