<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'nombre',
        'correo',
        'asunto',
        'descripcion',
    ];

    protected $table = 'contactos';

    public $timestamps = true;
}
