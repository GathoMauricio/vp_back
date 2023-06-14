<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepomex;

class SepomexController extends Controller
{
    public function load(Request $request, $cp)
    {
        $sepomex = Sepomex::where('cp', $cp)->orderBy('asentamiento')->get();
        return json_encode($sepomex);
    }
}
