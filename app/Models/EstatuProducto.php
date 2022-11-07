<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatuProducto extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'estatus',
    ];

    protected $table = 'estatusproductos';

    public $timestamps = true;
}
