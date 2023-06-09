<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'ticket_id',
        'usuario_id',
        'author_id',
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
        'tipo_equipo',
        'marca_equipo',
        'modelo_equipo',
        'serie_equipo',
        'password_equipo',
        'disco_duro_equipo',
        'capacidad_equipo',
        'procesador_equipo',
        'ram_equipo',
        'so_equipo',
        'office_equipo',
        'antivirus_equipo',
        'office_caducidad_equipo',
        'antivirus_caducidad_equipo',
        'software_equipo',
        'danio',
        'advertencia',
        'solucion',
        'calificacion',
        'firma_usuario_final',
        'firma_encargado',
        'firma_ing_servicio',
        'pagado',
        'motivo_cancelacion',
        'cotizar_producto',
        'especifique_cotizar_producto',
        'aprobado_time',
        'finalizado_time',
        'precio',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            //$query->author_id = Auth::user()->id;
        });
    }

    public function usuario()
    {
        return $this->belongsTo(
            'App\Models\User',
            'usuario_id',
            'id'
        )
            ->withDefault();
    }

    public function author()
    {
        return $this->belongsTo(
            'App\Models\User',
            'author_id',
            'id'
        )
            ->withDefault();
    }
    public function coordinador()
    {
        return $this->belongsTo(
            'App\Models\User',
            'coordinador_id',
            'id'
        )
            ->withDefault();
    }
    public function status()
    {
        return $this->belongsTo(
            'App\Models\Status',
            'status_id',
            'id'
        )
            ->withDefault();
    }
    public function clase()
    {
        return $this->belongsTo(
            'App\Models\Clase',
            'clase_id',
            'id'
        )
            ->withDefault();
    }
    public function tipos_servicios()
    {
        return $this->hasMany('App\Models\TicketServiceType', 'ticket_id');
    }
    public function ticket() //el ticket puede pertenecer a un ticket padre
    {
        return $this->belongsTo(
            'App\Models\Ticket',
            'ticket_id',
            'id'
        )
            ->withDefault();
    }
    public function tickets() //el ticket puede tener N tickets hijos
    {
        return $this->hasMany('App\Models\Ticket', 'ticket_id');
    }
    public function categoria()
    {
        return $this->belongsTo(
            'App\Models\Category',
            'category_id',
            'id'
        )
            ->withDefault();
    }
    public function vales() //el ticket puede tener N vales
    {
        return $this->hasMany('App\Models\ExpenseVoucher', 'ticket_id');
    }
}
