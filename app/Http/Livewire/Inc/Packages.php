<?php

namespace App\Http\Livewire\Inc;

use App\Models\Package;
use Livewire\Component;

class Packages extends Component
{
    public $packages = [];
    public $title;
    public $desc;
    public function mount(){
        $this->title = config('settings.package_page_title');
        $this->desc = config('settings.package_page');
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
