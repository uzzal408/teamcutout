<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class Payment extends Component
{
    public $title;
    public $desc;
    public function mount(){
        $this->title = config('settings.payment_page_title');
        $this->desc = config('settings.payment_page');
    }
    public function render()
    {
        return view('livewire.inc.payment');
    }
}
