<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provider;

class ProviderComponent extends Component
{
    protected $listeners = ['destroy' => 'destroy'];

    public $proveedor;

    public function render()
    {
        $proveedores = Provider::all();
        return view('livewire.provider-component', compact('proveedores'));
    }

    public function store()
    {
        $this->validate(
            [
                'proveedor' => 'required'
            ],
            [
                'proveedor.required' => 'Este campo es obligatorio'
            ]
        );
        $item = Provider::create([
            'proveedor' => $this->proveedor
        ]);
        if ($item) {
            $this->emit('successNotification', 'Registro almacenado.');
            $this->clean();
        }
    }

    public function destroy($id)
    {
        $item = Provider::find($id);
        if ($item->delete()) {
            $this->clean();
            $this->emit('successNotification', 'Registro eliminado.');
        }
    }

    public function clean()
    {
        $this->proveedor = null;
    }
}
