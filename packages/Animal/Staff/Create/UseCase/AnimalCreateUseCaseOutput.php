<?php

namespace Packages\Animal\Staff\Create\UseCase;


use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;

class AnimalCreateUseCaseOutput
{
    public function __construct(protected AnimalCreateAnimalEntity $animalEntity)
    {
    }

    /**
     * @return AnimalCreateAnimalEntity
     */
    public function AnimalEntity(): AnimalCreateAnimalEntity
    {
        return $this->animalEntity;
    }
}
