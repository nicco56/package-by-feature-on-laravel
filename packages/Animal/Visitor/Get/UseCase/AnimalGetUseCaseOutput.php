<?php

namespace Packages\Animal\Visitor\Get\UseCase;


use Packages\Animal\Visitor\Get\Domain\Entity\AnimalGetAnimalEntity;

class AnimalGetUseCaseOutput
{
    private ?AnimalGetAnimalEntity $animalEntity;

    /**
     * @param array $input
     */
    public function __construct(array $input)
    {
        $this->animalEntity = $input['animalEntity'];
    }

    /**
     * @return AnimalGetAnimalEntity|null
     */
    public function animalGetEntity(): ?AnimalGetAnimalEntity
    {
        return $this->animalEntity;
    }
}
