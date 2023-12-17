<?php

namespace Packages\Animal\Staff\Create\Domain\Repository;


use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;

interface AnimalCreateCommandInterface
{
    /**
     * @param AnimalCreateAnimalEntity $animalEntity
     * @return AnimalCreateAnimalEntity
     */
    public function create(AnimalCreateAnimalEntity $animalEntity): AnimalCreateAnimalEntity;
}
