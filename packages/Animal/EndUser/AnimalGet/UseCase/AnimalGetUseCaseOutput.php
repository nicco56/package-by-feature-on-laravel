<?php

namespace Packages\Animal\EndUser\AnimalGet\UseCase;


use Packages\Animal\EndUser\AnimalGet\Domain\Entity\AnimalEntity;

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
    public function AnimalGetEntity(): ?AnimalEntity
    {
        return $this->animalEntity;
    }
}
