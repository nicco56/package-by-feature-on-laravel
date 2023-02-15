<?php

namespace Packages\Animal\EndUser;

use Illuminate\Support\Facades\Route;
use Packages\Animal\EndUser\GetAnimal\Adaptor\GetAnimalControllerInterface;

class RouteServiceProvider
{
    /**
     * @return void
     */
    public function mapRoutes(): void
    {
        Route::get('/{id}', GetAnimalControllerInterface::class);
    }
}
