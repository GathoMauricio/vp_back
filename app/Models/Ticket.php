<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'usuario_id',
        'coordinador_id',
        'status_id',
        'clase_id',
        'folio',
        'inicio',
        'cierre',
        'prioridad',
        'problematica',
        'comentarios_usuario',
        'comentarios_cliente',
        'calificacion',
        'firma_usuario_final',
        'firma_encargado',
        'firma_ing_servicio',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->author_id = Auth::user()->id;
        });
    }
}
