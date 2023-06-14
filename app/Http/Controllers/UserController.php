<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function loadUserData(Request $request, $user_id)
    {
        $user = User::find($user_id);
        return json_encode($user);
    }

    public function index()
    {
        $users = User::where('role_id', '!=', 4)->orderBy('name')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('id', '<', 4)->get();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ], [
            'role_id.required' => 'Seleccione in rol para e usuario',
            'name.required' => 'Ingrese un nombre al usuario.',
            'email.required' => 'Ingrese un email al usuario.',
            'email.email' => 'Ingrese un email válido.',
            'password.required' => 'Ingrese una contraseña al usuario.',
            'password.min' => 'La contraseña debe contener mínimo 6 caracteres.',
        ]);

        $user = User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'sepomex_id' => $request->sepomex_id,
            'num_ext' => $request->num_ext,
            'num_int' => $request->num_int,
            'cp' => $request->cp,
            'password' => bcrypt($request->password),
        ]);
        if ($user) {
            \Session::flash('success', 'El usuario ' . $user->name . ' ha sido almacenado correctamente.');
            return redirect()->route('index/user');
        } else {
            \Session::flash('error', 'Error al intentar almacenar el registro por favor intente de nuevo.');
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        $roles = Role::where('id', '<', 4)->get();
        $user = User::findOrFail($id);
        return view('user.edit', compact('roles', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
        ], [
            'role_id.required' => 'Seleccione in rol para e usuario',
            'name.required' => 'Ingrese un nombre al usuario.',
        ]);
        $user = User::findOrFail($id);

        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->sepomex_id = $request->sepomex_id;
        $user->num_ext = $request->num_ext;
        $user->num_int = $request->num_int;
        $user->cp = $request->cp;

        if ($user->save()) {
            \Session::flash('success', 'El usuario ' . $user->name . ' ha sido actualizado correctamente.');
            return redirect()->route('index/user');
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
