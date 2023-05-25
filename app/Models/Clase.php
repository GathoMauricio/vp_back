<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $table = 'clases';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tipo',
        'tiempo_de',
        'tiempo_hasta',
        'precio',
    ];
}
