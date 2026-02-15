<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Modelo extends Model
{
    protected $table = 'modelos';

    protected $fillable = [
        'nombre',
        'marca',
        'ano',
        'descripcion',
    ];

    public function carros()
    {
        return $this->hasMany(Carro::class, 'modelo_id');
    }
}
