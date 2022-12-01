<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PriceQuery extends Component
{
    public $name;
    public $email;
    public $message;

    public function render()
    {
        return view('livewire.price-query');
    }

    public function saveQuery(){
        $validatedData = $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'message' => 'required|string|max:300'
        ]);

        \App\Models\PriceQuery::create($validatedData);
        $this->resetVal();
        $this->dispatchBrowserEvent('modal');
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Your query sent successfully Successfully!']);
    }

    public function resetVal()
    {
        $this->name = '';
        $this->email = '';
        $this->message = '';
    }
}
