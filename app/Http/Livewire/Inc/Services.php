<?php

namespace App\Http\Livewire\Inc;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public $services = [];
    public function mount(){
        $serv = Service::where('status',1)->orderBy('sorting','asc')->get();
        if($serv){
            $this->services = $serv->toArray();
        }
    }
    public function render()
    {
        return view('livewire.inc.services');
    }
}
