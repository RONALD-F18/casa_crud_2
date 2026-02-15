<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carros';

    protected $primaryKey = 'placa';

    protected $fillable = [
        'placa',
        'color',
        'modelo_id',
        'descripcion',
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }
}
