<?php

namespace App\Services;

use App\Repositories\Interfaces\CarroInterface;

class CarroService
{
    protected $carroRepository;

    public function __construct(CarroInterface $carroRepository)
    {
        $this->carroRepository = $carroRepository;
    }

    public function getAllCarros()
    {
        return $this->carroRepository->getAllCarros();
    }

    public function getCarroByPlaca($placa)
    {
        return $this->carroRepository->getCarroByPlaca($placa);
    }

    public function createCarro(array $data)
    {
        return $this->carroRepository->createCarro($data);
    }

    public function updateCarro($placa, array $data)
    {
        return $this->carroRepository->updateCarro($placa, $data);
    }

    public function deleteCarro($placa)
    {
        return $this->carroRepository->deleteCarro($placa);
    }

}