<?php

namespace App\Repositories\Eloquent;

use App\Models\Carro;
use App\Repositories\Interfaces\CarroInterface;

class CarroRepository implements CarroInterface
{
    public function getAllCarros()
    {
        return Carro::all();
    }

    public function getCarroByPlaca($placa)
    {
        $carro = Carro::find($placa);

        return !$carro ? null : $carro; // O lanzar una excepción personalizada
    }

    public function createCarro(array $data)
    {
        return Carro::create($data);
    }

    public function updateCarro($placa, array $data)
    {
        $carro = Carro::find($placa);

        if (!$carro) {
            return null; // O lanzar una excepción personalizada
        }

        $carro->update($data);

        return $carro;
    }

    public function deleteCarro($placa)
    {
        $carro = Carro::find($placa);

        if (!$carro) {
            return null; // O lanzar una excepción personalizada
        }

        $carro->delete();

        return true;
    }
}
