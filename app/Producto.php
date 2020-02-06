<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','cantidad','valor_compra','valor_venta','descripcion','proveedor_id'];
}
