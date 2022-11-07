<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenesarticulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'articulos_id',
        'imagenes',
    ];

    protected $table = 'imagenesarticulos';

    public $timestamps = true;
}
