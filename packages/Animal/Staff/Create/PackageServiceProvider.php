<?php

namespace Packages\Animal\Staff\Create;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\Staff\Create\Adaptor\AnimalCreateController;
use Packages\Animal\Staff\Create\Adaptor\AnimalCreateControllerInterface;
use Packages\Animal\Staff\Create\Domain\Repository\AnimalCreateQueryInterface;
use Packages\Animal\Staff\Create\Domain\Repository\DB\AnimalCreateQuery;

class PackageServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AnimalCreateControllerInterface::class => AnimalCreateController::class,
        AnimalCreateQueryInterface::class => AnimalCreateQuery::class,
    ];

    public function provides(): array
    {
        return array_keys($this->singletons);
    }
}
