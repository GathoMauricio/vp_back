<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    protected $table = 'service_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tipo',
        'abrev',
    ];
}
