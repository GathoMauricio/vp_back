<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vale;

class ValeComponent extends Component
{
    //Listener para llamadas desde js a php
    protected $listeners = ['destroy' => 'destroy'];
    //El ticket llega como parámetro al crear el componente
    public $ticket;
    //Variables públicas que hacen bind con las propiedades del componente
    public
        $vale_id,
        $ticket_id,
        $descripcion,
        $cantidad_recibida,
        $responsable,
        $cantidad_regresada,
        $gasto_total,
        $autorizado_por,
        $recibido_por;

    public function render()
    {
        $vales = Vale::where('ticket_id', $this->ticket->id)->get();
        return view('livewire.vale-component', compact('vales'));
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required|max:255',
            'cantidad_recibida' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'responsable' => 'required'
        ], [
            'descripcion.required' => 'Ingrese una descripción para el vale',
            'cantidad_recibida.required' => 'Ingrese la cantidad que recibirá el responsable',
            'cantidad_recibida.regex' => 'La cantidad no tiene un formato válido',
            'responsable.required' => 'Ingrese el nombre del responsable'
        ]);

        $vale = Vale::create([
            'ticket_id' => $this->ticket->id,
            'descripcion' => $this->descripcion,
            'cantidad_recibida' => $this->cantidad_recibida,
            'responsable' => $this->responsable,
            'cantidad_regresada' => 0,
            'gasto_total' => 0,
            'autorizado_por' => '',
            'recibido_por' => '',
        ]);

        if ($vale) {
            $this->clean();
            $this->emit('successNotification', 'Registro almacenado.');
            $this->emit('dismissCreateVale');
        } else {
            $this->emit('errorNotification', 'Error al procesar la solicitud');
        }
    }

    public function edit($vale_id)
    {
        $this->vale_id = $vale_id;
        $vale = Vale::findOrFail($this->vale_id);
        $this->ticket_id = $vale->ticket_id;
        $this->descripcion = $vale->descripcion;
        $this->cantidad_recibida = $vale->cantidad_recibida;
        $this->responsable = $vale->responsable;
        $this->cantidad_regresada = $vale->cantidad_regresada;
        $this->gasto_total = $vale->gasto_total;
        $this->autorizado_por = $vale->autorizado_por;
        $this->recibido_por = $vale->recibido_por;
    }

    public function update()
    {

        $this->validate([
            'descripcion' => 'required|max:255',
            'cantidad_recibida' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'cantidad_regresada' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'responsable' => 'required'
        ], [
            'descripcion.required' => 'Ingrese una descripción para el vale',
            'cantidad_recibida.required' => 'Ingrese la cantidad que recibirá el responsable',
            'cantidad_recibida.regex' => 'La cantidad no tiene un formato válido',
            'responsable.required' => 'Ingrese el nombre del responsable',
            'cantidad_regresada.regex' => 'La cantidad no tiene un formato válido',
        ]);
        $vale = Vale::findOrFail($this->vale_id);
        $vale->descripcion = $this->descripcion;
        $vale->cantidad_recibida = $this->cantidad_recibida ? $this->cantidad_recibida : 0;
        $vale->responsable = $this->responsable;
        $vale->cantidad_regresada = $this->cantidad_regresada ? $this->cantidad_regresada : 0;
        $vale->autorizado_por = $this->autorizado_por;
        $vale->recibido_por = $this->recibido_por;
        if ($vale->save()) {
            $this->clean();
            $this->emit('successNotification', 'Registro actualizado.');
            $this->emit('dismissEditVale');
        } else {
            $this->emit('errorNotification', 'Error al procesar la solicitud');
        }
    }

    public function destroy($vale_id)
    {
        $this->vale_id = $vale_id;
        $vale = Vale::findOrFail($this->vale_id);
        if ($vale->delete()) {
            #TODO
            //eliminar hijos
            $this->clean();
            $this->emit('successNotification', 'Registro eliminado.');
            $this->emit('dismissEditVale');
        } else {
            $this->emit('errorNotification', 'Error al procesar la solicitud');
        }
    }

    private function clean()
    {
        $this->ticket_id = null;
        $this->descripcion = null;
        $this->cantidad_recibida = null;
        $this->responsable = null;
        $this->cantidad_regresada = null;
        $this->gasto_total = null;
        $this->autorizado_por = null;
        $this->recibido_por = null;
    }
}
