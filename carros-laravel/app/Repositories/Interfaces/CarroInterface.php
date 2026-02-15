<?php

namespace App\Repositories\Interfaces;

interface CarroInterface
{
    public function getAllCarros();
    public function getCarroByPlaca($placa);
    public function createCarro(array $data);
    public function updateCarro($placa, array $data);
    public function deleteCarro($placa);
}