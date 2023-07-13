<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Concept;

class ConceptComponent extends Component
{
    protected $listeners = ['destroy' => 'destroy'];

    public $concepto;

    public function render()
    {
        $conceptos = Concept::all();
        return view('livewire.concept-component', compact('conceptos'));
    }

    public function store()
    {
        $this->validate(
            [
                'concepto' => 'required'
            ],
            [
                'concepto.required' => 'Este campo es obligatorio'
            ]
        );
        $item = Concept::create([
            'concepto' => $this->concepto
        ]);
        if ($item) {
            $this->emit('successNotification', 'Registro almacenado.');
            $this->clean();
        }
    }

    public function destroy($id)
    {
        $item = Concept::find($id);
        if ($item->delete()) {
            $this->clean();
            $this->emit('successNotification', 'Registro eliminado.');
        }
    }

    public function clean()
    {
        $this->concepto = null;
    }
}
