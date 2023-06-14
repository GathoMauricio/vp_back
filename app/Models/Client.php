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
        'sepomex_id',
        'num_int',
        'num_ext',
        'cp',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'client_id');
    }

    public function sepomex()
    {
        return $this->belongsTo(
            'App\Models\Sepomex',
            'sepomex_id',
            'id'
        )
            ->withDefault();
    }
}
