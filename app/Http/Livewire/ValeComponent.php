<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ValeComponent extends Component
{
    public $texto = "texto de prueba";

    public function render()
    {
        return view('livewire.vale-component');
    }
}
