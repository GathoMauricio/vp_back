<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        \Artisan::call('class:calculate');
        $tickets = Ticket::where('status_id', '<=', 4)->where('folio', 'NOT LIKE', '%|%')->orderBy('created_at', 'DESC')->get();
        return view('dashboard.index', compact('tickets'));
    }
}
