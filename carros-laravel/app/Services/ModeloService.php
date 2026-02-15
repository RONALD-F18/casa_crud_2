<?php

namespace App\Services;

use App\Repositories\Interfaces\ModeloInterface;

class ModeloService
{
    protected $modeloRepository;

    public function __construct(ModeloInterface $modeloRepository)
    {
        $this->modeloRepository = $modeloRepository;
    }

    public function getAllModelos()
    {
        return $this->modeloRepository->getAllModelos();
    }

    public function getModeloById($id)
    {
        return $this->modeloRepository->getModeloById($id);
    }

    public function createModelo(array $data)
    {
        return $this->modeloRepository->createModelo($data);
    }

    public function updateModelo($id, array $data)
    {
        return $this->modeloRepository->updateModelo($id, $data);
    }

    public function deleteModelo($id)
    {
        return $this->modeloRepository->deleteModelo($id);
    }
}