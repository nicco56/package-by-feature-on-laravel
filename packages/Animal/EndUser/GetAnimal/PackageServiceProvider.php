<?php

namespace Packages\Animal\EndUser\GetAnimal;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\EndUser\GetAnimal\Adaptor\AnimalGetController;
use Packages\Animal\EndUser\GetAnimal\Adaptor\AnimalGetControllerInterface;
use Packages\Animal\EndUser\GetAnimal\Repository\AnimalGetQueryInterface;
use Packages\Animal\EndUser\GetAnimal\Repository\DB\AnimalGetQuery;

class PackageServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AnimalGetControllerInterface::class => AnimalGetController::class,
        AnimalGetQueryInterface::class      => AnimalGetQuery::class,
    ];

    public function provides(): array
    {
        return array_keys($this->singletons);
    }
}
