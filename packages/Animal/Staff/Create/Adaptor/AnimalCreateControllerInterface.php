<?php

namespace Packages\Animal\Staff\Create\Adaptor;


interface AnimalCreateControllerInterface
{
    public function __invoke(AnimalCreateControllerInput $request);
}
