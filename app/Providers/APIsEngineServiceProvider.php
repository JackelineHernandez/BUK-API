<?php 

namespace BukApi\Providers;

use Illuminate\Support\ServiceProvider;
use BukApi\Contracts\Engines\IBaseEngine;
use BukApi\Contracts\Engines\Base\DefaultEngine;
use BukApi\Repositories\ProveedoresRepository;
use BukApi\Repositories\UbicacionRepository;
use BukApi\Repositories\ProveedorAdapterRepository;
use BukApi\Repositories\CategoriasRepository;
use BukApi\Contracts\Engines\IBaseResultProcessor;
use BukApi\Contracts\Engines\Base\DefaultResultProcessor;
use BukApi\Contracts\Engines\Base\DefaultContentFilter;


class APIsEngineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IBaseEngine::class, function ($app) {
            return new DefaultEngine();
        });
    }
}