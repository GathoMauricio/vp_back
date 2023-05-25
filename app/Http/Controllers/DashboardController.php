<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->get();
        return view('dashboard.index', compact('tickets'));
    }
}
