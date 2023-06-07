<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketServiceType extends Model
{
    use HasFactory;

    protected $table = 'ticket_service_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ticket_id',
        'tipo',
        'detalle',
    ];
}
