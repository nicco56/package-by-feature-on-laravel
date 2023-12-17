<?php

namespace Packages\Animal\Visitor\Get\Domain\Repository;


use Packages\Animal\Visitor\Get\Domain\Entity\AnimalGetAnimalEntity;

interface AnimalGetQueryInterface
{
    /**
     * @param int $id
     * @return AnimalGetAnimalEntity|null
     */
    public function animalGet(int $id): ?AnimalGetAnimalEntity;
}
