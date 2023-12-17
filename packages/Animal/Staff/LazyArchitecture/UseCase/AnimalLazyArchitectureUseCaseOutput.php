<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;


use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalLazyArchitectureAnimalEntity;

class AnimalLazyArchitectureUseCaseOutput
{
    public function __construct(
        protected AnimalLazyArchitectureAnimalEntity $animalEntity
    )
    {
    }

    /**
     * @return AnimalLazyArchitectureAnimalEntity
     */
    public function animalLazyArchitectureEntity(): AnimalLazyArchitectureAnimalEntity
    {
        return $this->animalEntity;
    }
}
