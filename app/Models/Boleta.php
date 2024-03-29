<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'dni', 'codigo'];
    public function envios()
    {
        return $this->hasMany(Envio::class);
    }
}
