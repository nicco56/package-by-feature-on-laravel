<?php

namespace Packages\Animal\EndUser;

use Illuminate\Support\Facades\Route;
use Packages\Animal\EndUser\AnimalGet\Adaptor\AnimalGetControllerInterface;

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
