<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'area_id',
        'nombre',
        'direccion',
    ];

    protected $table = 'responsables';

    public $timestamps = true;
}
