<?php

namespace Packages\Animal\Staff\Create;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Packages\Animal\Staff\Create\Adaptor\AnimalCreateController;
use Packages\Animal\Staff\Create\Adaptor\AnimalCreateControllerInterface;
use Packages\Animal\Staff\Create\Domain\Repository\AnimalCreateCommandInterface;
use Packages\Animal\Staff\Create\Domain\Repository\DB\AnimalCreateCommand;

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
