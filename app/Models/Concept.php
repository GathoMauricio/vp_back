<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;

    protected $table = 'concepts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'concepto'
    ];
}
