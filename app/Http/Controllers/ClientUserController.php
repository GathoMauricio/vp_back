<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientUserController extends Controller
{
    public function index($id)
    {
        $client = Client::find($id);
        $users = $client->users;
        return view('client_user.index', compact('client', 'users'));
    }

    public function create($id)
    {
        $client = Client::find($id);
        return view('client_user.create', compact('client'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'area' => 'required',
            // 'password' => 'required|min:6',
            // 'password_confirmation' => 'required_with:password|same:password|min:6'
        ], [
            'name.required' => 'Ingrese un nombre al usuario.',
            'email.required' => 'Ingrese un email al usuario.',
            'email.email' => 'Ingrese un email válido.',
            'area.required' => 'Agregue el área',
            // 'password.required' => 'Ingrese una contraseña al usuario.',
            // 'password.min' => 'La contraseña debe contener mínimo 6 caracteres.',
        ]);

        $user = User::create([
            'role_id' => 4,
            'client_id' => $id,
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'area' => $request->area,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'sepomex_id' => $request->sepomex_id,
            'calle' => $request->calle,
            'num_ext' => $request->num_ext,
            'num_int' => $request->num_int,
            'cp' => $request->cp,
            'password' => bcrypt($request->password),
        ]);
        if ($user) {
            \Session::flash('success', 'El usuario ' . $user->name . ' ha sido almacenado correctamente.');
            return redirect()->route('index/client_user', $id);
        } else {
            \Session::flash('error', 'Error al intentar almacenar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('client_user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',
            // 'password' => 'required|min:6',
            // 'password_confirmation' => 'required_with:password|same:password|min:6'
        ], [
            'name.required' => 'Ingrese un nombre al usuario.',
            'area.required' => 'Agregue el área',
            // 'password.required' => 'Ingrese una contraseña al usuario.',
            // 'password.min' => 'La contraseña debe contener mínimo 6 caracteres.',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->telefono = $request->telefono;
        $user->area = $request->area;
        $user->direccion = $request->direccion;
        $user->sepomex_id = $request->sepomex_id;
        $user->calle = $request->calle;
        $user->num_ext = $request->num_ext;
        $user->num_int = $request->num_int;
        $user->cp = $request->cp;

        if ($user->save()) {
            \Session::flash('success', 'El usuario ' . $user->name . ' ha sido actualizado correctamente.');
            return redirect()->route('index/client_user', $user->client_id);
        } else {
            \Session::flash('error', 'Error al intentar actualizar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if ($user->delete()) {
            return "Usuario eliminado";
        } else {
            return "Error al eliminar";
        }
    }
}
