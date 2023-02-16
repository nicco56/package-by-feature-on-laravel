<?php

namespace Packages\Animal\EndUser\AnimalGet;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\EndUser\AnimalGet\Adaptor\AnimalGetController;
use Packages\Animal\EndUser\AnimalGet\Adaptor\AnimalGetControllerInterface;
use Packages\Animal\EndUser\AnimalGet\Domain\Repository\AnimalGetQueryInterface;
use Packages\Animal\EndUser\AnimalGet\Domain\Repository\DB\AnimalGetQuery;

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
