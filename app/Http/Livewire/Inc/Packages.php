<?php

namespace App\Http\Livewire\Inc;

use App\Models\Package;
use Livewire\Component;

class Packages extends Component
{
    public $packages = [];
    public function mount(){
        $pack = Package::where('status',1)->orderBy('sorting','asc')->get();
        if($pack){
            $this->packages = $pack->toArray();
        }
    }
    public function render()
    {
        return view('livewire.inc.packages');
    }
}
