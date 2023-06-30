<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseVoucher;
use Nette\Schema\Expect;

class ExpenseVoucherController extends Controller
{
    public function get(Request $request)
    {
        $vale = ExpenseVoucher::find($request->id);
        return json_encode($vale);
    }
    public function show(Request $request)
    {
        $vale = ExpenseVoucher::find($request->id);

        return json_encode([
            'id' => $vale->id,
            'proveedor' => $vale->proveedor->proveedor,
            'concepto' => $vale->concepto->concepto,
            'responsable' => $vale->responsable->name . ' ' . $vale->responsable->apellido,
            'autoriza' => $vale->autoriza->name . ' ' . $vale->autoriza->apellido,
            'recibe' => $vale->recibe->name . ' ' . $vale->recibe->apellido,
            'estatus' => $vale->status,
            'cantidad' => $vale->cantidad,
            'motivo_visita' => $vale->motivo_visita,
            'detalle' => $vale->detalle,
            'estatus' => $vale->status,
        ]);
    }
    public function store(Request $request)
    {
        $vale = ExpenseVoucher::create([
            'ticket_id' => $request->ticket_id,
            'provider_id' => $request->provider_id,
            'responsable_id' => $request->responsable_id,
            'autoriza_id' => $request->autoriza_id,
            'recibe_id' => $request->recibe_id,
            'concept_id' => $request->concept_id,
            'status' => $request->status,
            'cantidad' => $request->cantidad,
            'motivo_visita' => $request->motivo_visita,
            'detalle' => $request->detalle,
        ]);
        $data = [];
        foreach (ExpenseVoucher::where('ticket_id', $request->ticket_id)->get() as $vale) {
            $data[] = [
                'id' => $vale->id,
                'ticket_id' => $request->ticket_id,
                'concepto' => $vale->concepto->concepto,
                'responsable' => $vale->responsable->name . ' ' . $vale->responsable->apellido,
                'cantidad' => $vale->cantidad,
                'detalle' => $vale->detalle,
                'estatus' => $vale->status,
            ];
        }

        if ($vale) {
            return json_encode([
                'error' => 0,
                'message' => 'El registro que ingreso con éxito.',
                'data' => $data
            ]);
        } else {
            return json_encode([
                'error' => 1,
                'message' => 'Error durante la operación.'
            ]);
        }
    }

    public function update(Request $request)
    {
        $vale = ExpenseVoucher::find($request->id);
        $vale->update($request->all());
        $data = [];
        foreach (ExpenseVoucher::where('ticket_id', $request->ticket_id)->get() as $vale) {
            $data[] = [
                'id' => $vale->id,
                'concepto' => $vale->concepto->concepto,
                'responsable' => $vale->responsable->name . ' ' . $vale->responsable->apellido,
                'cantidad' => $vale->cantidad,
                'detalle' => $vale->detalle,
                'estatus' => $vale->status,
            ];
        }

        if ($vale) {
            return json_encode([
                'error' => 0,
                'message' => 'El registro que actualizó con éxito.',
                'data' => $data
            ]);
        } else {
            return json_encode([
                'error' => 1,
                'message' => 'Error durante la operación.'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $vale = ExpenseVoucher::findOrFail($request->id);
        if ($vale->delete()) {
            $data = [];
            foreach (ExpenseVoucher::where('ticket_id', $request->ticket_id)->get() as $vale) {
                $data[] = [
                    'id' => $vale->id,
                    'concepto' => $vale->concepto->concepto,
                    'responsable' => $vale->responsable->name . ' ' . $vale->responsable->apellido,
                    'cantidad' => $vale->cantidad,
                    'detalle' => $vale->detalle,
                    'estatus' => $vale->status,
                ];
            }
            return json_encode([
                'error' => 0,
                'message' => 'El registro que eliminó con éxito.',
                'data' => $data
            ]);
        } else {
            return json_encode([
                'error' => 1,
                'message' => 'Error durante la operación.'
            ]);
        }
    }
}
