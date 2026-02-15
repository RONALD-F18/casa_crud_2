<?php

namespace App\Repositories\Interfaces;

interface ModeloInterface
{
    public function getAllModelos();
    public function getModeloById($id);
    public function createModelo(array $data);
    public function updateModelo($id, array $data);
    public function deleteModelo($id);
}