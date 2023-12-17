<?php

namespace Packages\Animal\Staff;

use Illuminate\Support\Facades\Route;
use Packages\Animal\Staff\Create\Adaptor\AnimalCreateControllerInterface;
use Packages\Animal\Staff\LazyArchitecture\Adaptor\AnimalLazyArchitectureController;

class RouteServiceProvider
{
    /**
     * @return void
     */
    public function mapRoutes(): void
    {
        // 正規版
        Route::post('/', AnimalCreateControllerInterface::class);

        // インターフェースを端折った版。こちらの方が簡単。
        Route::post('/lazy', AnimalLazyArchitectureController::class);
    }
}
