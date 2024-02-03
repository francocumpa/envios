<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha', 'envio_id'];
    public function envio()
    {
        return $this->belongsTo(Envio::class);
    }
}
