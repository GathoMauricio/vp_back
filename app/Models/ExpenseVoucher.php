<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseVoucher extends Model
{
    use HasFactory;

    protected $table = 'expense_vouchers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ticket_id',
        'provider_id',
        'responsable_id',
        'autoriza_id',
        'recibe_id',
        'concept_id',
        'status',
        'cantidad',
        'motivo_visita',
        'detalle',
    ];

    public function proveedor()
    {
        return $this->belongsTo(
            'App\Models\Provider',
            'provider_id',
            'id'
        )
            ->withDefault();
    }
    public function responsable()
    {
        return $this->belongsTo(
            'App\Models\User',
            'responsable_id',
            'id'
        )
            ->withDefault();
    }
    public function autoriza()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autoriza_id',
            'id'
        )
            ->withDefault();
    }
    public function recibe()
    {
        return $this->belongsTo(
            'App\Models\User',
            'recibe_id',
            'id'
        )
            ->withDefault();
    }
    public function concepto()
    {
        return $this->belongsTo(
            'App\Models\Concept',
            'concept_id',
            'id'
        )
            ->withDefault();
    }
}
