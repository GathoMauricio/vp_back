<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'razon_social',
        'telefono',
        'direccion',
        'rfc',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'client_id');
    }
}
