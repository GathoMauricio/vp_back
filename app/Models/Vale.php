<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    use HasFactory;

    protected $table = 'vales';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ticket_id',
        'descripcion',
        'cantidad_recibida',
        'responsable',
        'cantidad_regresada',
        'gasto_total',
        'autorizado_por',
        'recibido_por',
    ];

    public function ticket()
    {
        return $this->belongsTo(
            'App\Models\Ticket',
            'ticket_id',
            'id'
        )
            ->withDefault();
    }

    public function gastos()
    {
        return $this->hasMany('App\Models\Gasto', 'vale_id');
    }
}
