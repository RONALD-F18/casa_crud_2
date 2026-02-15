<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ModeloInterface;
use App\Repositories\Eloquent\ModeloRepository;
use App\Repositories\Interfaces\CarroInterface;
use App\Repositories\Eloquent\CarroRepository;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ModeloInterface::class,
            ModeloRepository::class
        );

        $this->app->bind(
            CarroInterface::class,
            CarroRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
