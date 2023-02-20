<?php

namespace Packages\Animal\EndUser\AnimalGet\Domain\Repository;


use Packages\Animal\EndUser\AnimalGet\Domain\Entity\AnimalEntity;

interface AnimalGetQueryInterface
{
    /**
     * @param int $id
     * @return AnimalEntity|null
     */
    public function animalGet(int $id): ?AnimalEntity;
}
