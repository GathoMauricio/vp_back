<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function loadUserData(Request $request, $user_id)
    {
        $user = User::find($user_id);
        return json_encode($user);
    }
}
