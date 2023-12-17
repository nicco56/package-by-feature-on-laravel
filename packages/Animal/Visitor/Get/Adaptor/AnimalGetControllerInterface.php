<?php

namespace Packages\Animal\Visitor\Get\Adaptor;


interface AnimalGetControllerInterface
{
    public function __invoke(AnimalGetControllerInput $request);
}
