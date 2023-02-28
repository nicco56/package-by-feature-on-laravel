<?php

namespace Packages\Animal\Admin\AnimalCreate\Domain\Repository;


use Packages\Animal\Admin\AnimalCreate\Domain\Entity\AnimalEntity;

interface AnimalCreateCommandInterface
{
    /**
     * @param AnimalEntity $animalEntity
     * @return AnimalEntity
     */
    public function AnimalCreate(AnimalEntity $animalEntity): AnimalEntity;
}
