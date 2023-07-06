<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'vale_id',
        'proveedor',
        'proveedor_otro',
        'concepto',
        'concepto_otro',
        'costo',
        'detalle',
    ];

    public function vale()
    {
        return $this->belongsTo(
            'App\Models\Vale',
            'vale_id',
            'id'
        )
            ->withDefault();
    }
}
