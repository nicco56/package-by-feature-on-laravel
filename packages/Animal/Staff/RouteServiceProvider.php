<?php

namespace Packages\Animal\Admin;

use Illuminate\Support\Facades\Route;
use Packages\Animal\Admin\AnimalCreate\Adaptor\AnimalCreateControllerInterface;

class RouteServiceProvider
{
    /**
     * @return void
     */
    public function mapRoutes(): void
    {
        Route::post('/', AnimalCreateControllerInterface::class);
    }
}
