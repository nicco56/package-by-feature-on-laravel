<?php

namespace Packages\Animal\Staff\Create\Domain\Repository;


use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;

interface AnimalCreateQueryInterface
{
    /**
     * @param string $name
     * @param int $width
     * @return AnimalCreateAnimalEntity
     */
    public function create(string $name, int $width): AnimalCreateAnimalEntity;
}
