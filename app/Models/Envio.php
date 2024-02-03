<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_entrega', 'direccion', 'estado', 'boleta_id', 'tipo'];
    public function boleta()
    {
        return $this->belongsTo(Boleta::class);
    }
}
