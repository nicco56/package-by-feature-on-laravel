<?php

namespace Packages\Animal\EndUser\GetAnimal\Adaptor;


interface GetAnimalControllerInterface
{
    public function __invoke(GetAnimalControllerInput $request);
}
