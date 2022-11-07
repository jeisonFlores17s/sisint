<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = [
            'id',
            'fechaadquisicion',
            'marca',
            'modelo',
            'serie',
            'codigo',
            'foliocomprobante',
            'descripcion',
            'estado',
            'costodeadquisicion',
            'area_id',
            'estatu_id',
            'observaciones',
            'estatus',
            'user_id',
    ];

}
