<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public $formStep = 1;

    public $name;
    public $body;
    public $user_name;
    public $address;

    public function nextStep()
    {
        $this->validate([
            'name' => ['required'],
            'body' => ['required']
        ]);
        $this->formStep++;
    }
    public function prevStep()
    {
        $this->formStep--;
    }

    public function storeProduct()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'body' => ['required'],
            'user_name' => ['required'],
            'address' => ['required']
        ]);
        Product::create($validated);
        $this->reset();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.product-create');
    }
}
