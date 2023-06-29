<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        \Artisan::call('class:calculate');
        $tickets = Ticket::where('status_id', '<=', 4)->orderBy('created_at', 'ASC')->get();
        return view('dashboard.index', compact('tickets'));
    }
}
