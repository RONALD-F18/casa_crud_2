<?php

namespace App\Repositories\Eloquent;

use App\Models\Modelo;
use App\Repositories\Interfaces\ModeloInterface;

class ModeloRepository implements ModeloInterface
{
    public function getAllModelos()
    {
        return Modelo::all();
    }

    public function getModeloById($id)
    {
        $modelo = Modelo::find($id);

        return !$modelo ? null : $modelo; // O lanzar una excepción personalizada

    } 

    public function createModelo(array $data)
    {
        return Modelo::create($data);
    }

    public function updateModelo($id, array $data)
    {
        $modelo = Modelo::find($id);

        if (!$modelo) {
           return null; // O lanzar una excepción personalizada
        }

        $modelo->update($data);

        return $modelo;
    }

    public function deleteModelo($id)
    {
        $modelo = Modelo::find($id);

        if (!$modelo) {
            return null; // O lanzar una excepción personalizada
        }

        $modelo->delete();

        return true;
    }
}