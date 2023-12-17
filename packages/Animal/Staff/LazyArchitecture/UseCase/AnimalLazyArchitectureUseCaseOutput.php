<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;


use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalEntity;

class AnimalLazyArchitectureUseCaseOutput
{
    private AnimalEntity $animalEntity;

    /**
     * @param array $input
     */
    public function __construct(array $input)
    {
        $this->animalEntity = $input['animalEntity'];
    }

    /**
     * @return AnimalEntity
     */
    public function AnimalLazyArchitectureEntity(): AnimalEntity
    {
        return $this->animalEntity;
    }
}
