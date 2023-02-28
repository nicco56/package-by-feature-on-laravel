<?php

namespace Packages\Animal\Admin\AnimalCreate\UseCase;


use Packages\Animal\Admin\AnimalCreate\Domain\Entity\AnimalEntity;

class AnimalCreateUseCaseOutput
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
    public function AnimalCreateEntity(): AnimalEntity
    {
        return $this->animalEntity;
    }
}
