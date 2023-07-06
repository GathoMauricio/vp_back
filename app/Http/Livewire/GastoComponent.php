<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vale;
use App\Models\Gasto;
use App\Models\Provider;
use App\Models\Concept;

class GastoComponent extends Component
{
    //Listener para llamadas desde js a php
    protected $listeners = ['destroy' => 'destroy'];
    //El vale llega como parámetro al crear el componente
    public $vale;
    //Variables públicas que hacen bind con las propiedades del componente
    public
        $gasto_id,
        $proveedor,
        $proveedor_otro,
        $concepto,
        $concepto_otro,
        $costo,
        $detalle;

    //Helpers
    public $displayOtroProveedor = false;
    public $displayOtroConcepto = false;

    public function mount(Vale $vale)
    {
        $this->vale = $vale;
    }
    public function render()
    {
        $this->calcularGastoTotal($this->vale->id);
        $this->vale = Vale::find($this->vale->id);
        $gastos = $this->vale->gastos;
        $proveedores = Provider::orderBy('proveedor')->get();
        $conceptos = Concept::orderBy('concepto')->get();
        return view('livewire.gasto-component', compact('gastos', 'proveedores', 'conceptos'));
    }

    public function store()
    {
        $rules = ['costo' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'];
        $this->displayOtroProveedor ? $rules += ['proveedor_otro' => 'required'] : ['proveedor' => ''];
        $this->displayOtroConcepto ? $rules += ['concepto_otro' => 'required'] : $rules += ['concepto' => 'required'];
        $this->validate($rules, []);

        $gasto = Gasto::create([
            'vale_id' => $this->vale->id,
            'proveedor' => $this->proveedor,
            'proveedor_otro' => $this->proveedor_otro,
            'concepto' => $this->concepto,
            'concepto_otro' => $this->concepto_otro,
            'costo' => $this->costo,
            'detalle'  => $this->detalle,
        ]);

        if ($gasto) {
            $this->clean();
            $this->emit('successNotification', 'Registro almacenado.');
            $this->emit('dismissCreateGasto');
        } else {
            $this->emit('errorNotification', 'Error al procesar la solicitud');
        }
    }

    public function edit($gasto_id)
    {
        $this->gasto_id = $gasto_id;
        $gasto = Gasto::findOrFail($this->gasto_id);
        $this->proveedor = $gasto->proveedor;
        $this->proveedor_otro = $gasto->proveedor_otro;
        $this->concepto = $gasto->concepto;
        $this->concepto_otro = $gasto->concepto_otro;
        $this->costo = $gasto->costo;
        $this->detalle = $gasto->detalle;
        $this->proveedor == 'OTRO' ? $this->displayOtroProveedor = true : $this->displayOtroProveedor = false;
        $this->concepto == 'OTRO' ? $this->displayOtroConcepto = true : $this->displayOtroConcepto = false;
    }

    public function update()
    {
        $rules = ['costo' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'];
        $this->displayOtroProveedor ? $rules += ['proveedor_otro' => 'required'] : ['proveedor' => ''];
        $this->displayOtroConcepto ? $rules += ['concepto_otro' => 'required'] : $rules += ['concepto' => 'required'];
        $this->validate($rules, []);

        $gasto = Gasto::findOrFail($this->gasto_id);
        $gasto->proveedor = $this->proveedor;
        $gasto->proveedor_otro = $this->proveedor_otro;
        $gasto->concepto = $this->concepto;
        $gasto->concepto_otro = $this->concepto_otro;
        $gasto->costo = $this->costo;
        $gasto->detalle = $this->detalle;
        if ($gasto->save()) {
            $this->clean();
            $this->emit('successNotification', 'Registro actualizado.');
            $this->emit('dismissEditGasto');
        } else {
            $this->emit('errorNotification', 'Error al procesar la solicitud');
        }
    }

    public function changeProvider()
    {
        if ($this->proveedor == 'OTRO') {
            $this->displayOtroProveedor = true;
        } else {
            $this->displayOtroProveedor = false;
        }
    }

    public function changeConcept()
    {
        if ($this->concepto == 'OTRO') {
            $this->displayOtroConcepto = true;
        } else {
            $this->displayOtroConcepto = false;
        }
    }


    public function destroy($tipo, $gasto_id)
    {
        if ($tipo == 'gasto') {
            $this->gasto_id = $gasto_id;
            $gasto = Gasto::findOrFail($this->gasto_id);
            if ($gasto->delete()) {
                $this->clean();
                $this->emit('successNotification', 'Registro eliminado.');
                $this->emit('dismissEditVale');
            } else {
                $this->emit('errorNotification', 'Error al procesar la solicitud');
            }
        }
    }

    public function calcularGastoTotal($vale_id)
    {
        $vale = Vale::find($vale_id);
        if ($vale) {
            $gastos = $vale->gastos;
            $gasto_total = 0;
            foreach ($gastos as $gasto) {
                $gasto_total += doubleval($gasto->costo);
            }
            $vale->gasto_total = $gasto_total;
            $vale->save();
        }
    }

    public function clean()
    {
        $this->gasto_id = null;
        $this->proveedor = null;
        $this->proveedor_otro = null;
        $this->concepto = null;
        $this->concepto_otro = null;
        $this->costo = null;
        $this->detalle = null;
    }
}
