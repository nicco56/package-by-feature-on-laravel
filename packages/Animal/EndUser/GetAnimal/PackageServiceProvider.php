<?php

namespace Packages\Animal\EndUser\GetAnimal;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\EndUser\GetAnimal\Adaptor\GetAnimalController;
use Packages\Animal\EndUser\GetAnimal\Adaptor\GetAnimalControllerInterface;
use Packages\Animal\EndUser\GetAnimal\Repository\GetAnimalQueryInterface;
use Packages\Animal\EndUser\GetAnimal\Repository\DB\GetAnimalQuery;

class PackageServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        GetAnimalControllerInterface::class => GetAnimalController::class,
        GetAnimalQueryInterface::class      => GetAnimalQuery::class,
    ];

    public function provides(): array
    {
        return array_keys($this->singletons);
    }
}
