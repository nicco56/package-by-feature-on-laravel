<?php

namespace Packages\Animal\EndUser\GetAnimal\UseCase;


use Packages\Animal\EndUser\GetAnimal\Domain\Entity\AnimalEntity;

class AnimalGetUseCaseOutput
{
    private ?AnimalEntity $animalEntity;

    /**
     * @param array $input
     */
    public function __construct(array $input)
    {
        $this->animalEntity = $input['animalEntity'];
    }

    /**
     * @return AnimalEntity|null
     */
    public function getAnimalEntity(): ?AnimalEntity
    {
        return $this->animalEntity;
    }
}
