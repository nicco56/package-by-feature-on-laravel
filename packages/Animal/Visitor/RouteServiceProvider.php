<?php

namespace Packages\Animal\Visitor;

use Illuminate\Support\Facades\Route;
use Packages\Animal\Visitor\Get\Adaptor\AnimalGetControllerInterface;

class RouteServiceProvider
{
    /**
     * @return void
     */
    public function mapRoutes(): void
    {
        Route::get('/{id}', AnimalGetControllerInterface::class);
    }
}
