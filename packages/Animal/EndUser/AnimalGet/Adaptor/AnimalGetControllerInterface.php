<?php

namespace Packages\Animal\EndUser\AnimalGet\Adaptor;


interface AnimalGetControllerInterface
{
    public function __invoke(AnimalGetControllerInput $request);
}
