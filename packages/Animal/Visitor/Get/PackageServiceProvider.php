<?php

namespace Packages\Animal\Visitor\Get;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\Visitor\Get\Adaptor\AnimalGetController;
use Packages\Animal\Visitor\Get\Adaptor\AnimalGetControllerInterface;
use Packages\Animal\Visitor\Get\Domain\Repository\AnimalGetQueryInterface;
use Packages\Animal\Visitor\Get\Domain\Repository\DB\AnimalGetQuery;

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
