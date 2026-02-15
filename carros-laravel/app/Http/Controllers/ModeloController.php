<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ModeloRequest;
use App\Services\ModeloService;


class ModeloController extends Controller
{
    protected $modeloService;

    public function __construct(ModeloService $modeloService)
    {
        $this->modeloService = $modeloService;
    }

    public function index()
    {
        $models = $this->modeloService->getAllModelos();

        return response()->json([
            'message' => 'Modelos retrieved successfully',
            'data' => $models
        ], 200);
    }

    public function show($id)
    {
        $modelo = $this->modeloService->getModeloById($id);

        if (!$modelo) {
            return response()->json([
                'message' => 'Modelo not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Modelo retrieved successfully',
            'data' => $modelo
        ], 200);
    }

    public function store(ModeloRequest $request)
    {
        $data = $request->validated();
        $modelo = $this->modeloService->createModelo($request);

        return response()->json([
            'message' => 'Modelo created successfully',
            'data' => $modelo
        ], 201);
    }

    public function update($id, ModeloRequest $request)
    {
        $data = $request->validated();
        $modelo = $this->modeloService->updateModelo($id, $request);

        return response()->json([
            'message' => 'Modelo updated successfully',
            'data' => $modelo
        ], 200);
    }

    public function destroy($id)
    {
        $deleted = $this->modeloService->deleteModelo($id);

        if (!$deleted) {
            return response()->json([
                'message' => 'Modelo not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Modelo deleted successfully'
        ], 200);
    }


}
