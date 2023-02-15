<?php

namespace Packages\Animal\EndUser\GetAnimal\Repository;


use Packages\Animal\EndUser\GetAnimal\Domain\Entity\AnimalEntity;

interface AnimalGetQueryInterface
{
    /**
     * @param int $id
     * @return AnimalEntity|null
     */
    public function getAnimal(int $id): ?AnimalEntity;
}
