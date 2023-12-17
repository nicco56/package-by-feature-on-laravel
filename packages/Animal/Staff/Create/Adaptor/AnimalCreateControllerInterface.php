<?php

namespace Packages\Animal\Admin\AnimalCreate\Adaptor;


interface AnimalCreateControllerInterface
{
    public function __invoke(AnimalCreateControllerInput $request);
}
