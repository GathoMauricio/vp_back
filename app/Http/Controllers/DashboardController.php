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
        $ticketsAll = Ticket::where('status_id', '<=', 4)->get();
        $cotizacionNum = $ticketsAll->where('status_id', 1)->count();
        $aprobadonNum = $ticketsAll->where('status_id', 2)->count();
        $procesoNum = $ticketsAll->where('status_id', 3)->count();
        $terminadoNum = $ticketsAll->where('status_id', 4)->count();
        return view('dashboard.index', compact('tickets', 'cotizacionNum', 'aprobadonNum', 'procesoNum', 'terminadoNum'));
    }
}
