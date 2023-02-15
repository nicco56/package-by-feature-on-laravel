<?php

namespace Packages\Animal\EndUser\GetAnimal\Adaptor;


interface AnimalGetControllerInterface
{
    public function __invoke(AnimalGetControllerInput $request);
}
