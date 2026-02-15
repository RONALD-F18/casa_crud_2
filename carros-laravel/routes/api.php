<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CarroController;

Route::apiResource('modelos', ModeloController::class);
Route::apiResource('carros', CarroController::class);