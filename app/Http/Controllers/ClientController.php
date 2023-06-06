<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    public function loadUsersByClient(Request $request, $client_id)
    {
        $users = User::where('client_id', $client_id)->get();
        return json_encode($users);
    }
}
