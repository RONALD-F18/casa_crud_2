<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarroRequest;
use App\Services\CarroService;

class CarroController extends Controller
{
    protected $carroService;

    public function __construct(CarroService $carroService)
    {
        $this->carroService = $carroService;
    }

    public function index()
    {
        $carros = $this->carroService->getAllCarros();

        return response()->json([
            'message' => 'Carros retrieved successfully',
            'data' => $carros
        ], 200);
    }

    public function show($placa)
    {
        $carro = $this->carroService->getCarroByPlaca($placa);

        if (!$carro) {
            return response()->json([
                'message' => 'Carro not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Carro retrieved successfully',
            'data' => $carro
        ], 200);
    }

    public function store(CarroRequest $request)
    {
        $data = $request->validated();
        $carro = $this->carroService->createCarro($data);

        return response()->json([
            'message' => 'Carro created successfully',
            'data' => $carro
        ], 201);
    }

    public function update($placa, CarroRequest $request)
    {
        $data = $request->validated();
        $carro = $this->carroService->updateCarro($placa, $data);

        return response()->json([
            'message' => 'Carro updated successfully',
            'data' => $carro
        ], 200);
    }

    public function destroy($placa)
    {
        $deleted = $this->carroService->deleteCarro($placa);

        if (!$deleted) {
            return response()->json([
                'message' => 'Carro not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Carro deleted successfully'
        ], 200);
    }
}
