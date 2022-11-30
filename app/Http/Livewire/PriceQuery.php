<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PriceQuery extends Component
{
    public $name;
    public $email;
    public $message;

//    protected $rules = [
//        'name' => 'required|min:6',
//        'email' => 'required|email',
//        'message' => 'required|string|max:300',
//    ];

    public function render()
    {
        return view('livewire.price-query');
    }

    public function saveQuery(){
//        $validatedData = $this->validate();
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|string|max:300'
        ]);

        \App\Models\PriceQuery::create($validatedData);
        $this->dispatchBrowserEvent('modal');
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Your query sent successfully Successfully!']);
    }
}
