<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('razon_social')->get();
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'razon_social' => 'required',
                'telefono' => 'required',
            ],
            [
                'razon_social.required' => 'Por favor agregue el nombre o razón social del cliente',
                'telefono.required' => 'Proporcione un número telefónico.',
            ]
        );
        $client = Client::create([
            'razon_social' => $request->razon_social,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rfc' => $request->rfc,
            'sepomex_id' => $request->sepomex_id,
            'num_ext' => $request->num_ext,
            'num_int' => $request->num_int,
            'cp' => $request->cp,
        ]);
        if ($client) {
            \Session::flash('success', 'El cliente ' . $client->razon_social . ' ha sido almacenado correctamente.');
            return redirect()->route('index/client');
        } else {
            \Session::flash('error', 'Error al intentar almacenar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'razon_social' => 'required',
                'telefono' => 'required',
            ],
            [
                'razon_social.required' => 'Por favor agregue el nombre o razón social del cliente',
                'telefono.required' => 'Proporcione un número telefónico.',
            ]
        );
        $client = Client::findOrFail($id);
        $client->razon_social = $request->razon_social;
        $client->telefono = $request->telefono;
        $client->direccion = $request->direccion;
        $client->rfc = $request->rfc;
        $client->sepomex_id = $request->sepomex_id;
        $client->num_ext = $request->num_ext;
        $client->num_int = $request->num_int;
        $client->cp = $request->cp;
        if ($client->save()) {
            \Session::flash('success', 'El cliente ' . $client->razon_social . ' ha sido actualizado correctamente.');
            return redirect()->route('index/client');
        } else {
            \Session::flash('error', 'Error al intentar actualizar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $client = Client::findOrFail($request->client_id);
        if ($client->delete()) {
            return "Cliente eliminado";
        } else {
            return "Error al eliminar";
        }
    }

    public function loadUsersByClient(Request $request, $client_id)
    {
        $users = User::where('client_id', $client_id)->get();
        return json_encode($users);
    }
}
