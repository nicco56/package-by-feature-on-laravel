<?php

namespace Packages\Animal\Admin\AnimalCreate;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\Admin\AnimalCreate\Adaptor\AnimalCreateController;
use Packages\Animal\Admin\AnimalCreate\Adaptor\AnimalCreateControllerInterface;
use Packages\Animal\Admin\AnimalCreate\Domain\Repository\AnimalCreateCommandInterface;
use Packages\Animal\Admin\AnimalCreate\Domain\Repository\DB\AnimalCreateCommand;

class PackageServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AnimalCreateControllerInterface::class => AnimalCreateController::class,
        AnimalCreateCommandInterface::class    => AnimalCreateCommand::class,
    ];

    public function provides(): array
    {
        return array_keys($this->singletons);
    }
}
