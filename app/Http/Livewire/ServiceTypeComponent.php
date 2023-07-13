<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceType;

class ServiceTypeComponent extends Component
{
    protected $listeners = ['destroy' => 'destroy'];

    public $tipo, $abrev;

    public function render()
    {
        $tipos = ServiceType::all();
        return view('livewire.service-type-component', compact('tipos'));
    }

    public function store()
    {
        $this->validate(
            [
                'tipo' => 'required',
                'abrev' => 'required'
            ],
            [
                'tipo.required' => 'Este campo es obligatorio',
                'abrev.required' => 'Este campo es obligatorio'
            ]
        );
        $item = ServiceType::create([
            'tipo' => $this->tipo,
            'abrev' => $this->abrev
        ]);
        if ($item) {
            $this->emit('successNotification', 'Registro almacenado.');
            $this->clean();
        }
    }

    public function destroy($id)
    {
        $item = ServiceType::find($id);
        if ($item->delete()) {
            $this->clean();
            $this->emit('successNotification', 'Registro eliminado.');
        }
    }

    public function clean()
    {
        $this->tipo = null;
        $this->abrev = null;
    }
}
