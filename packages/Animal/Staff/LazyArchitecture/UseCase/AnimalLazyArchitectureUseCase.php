<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;


use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalLazyArchitectureAnimalEntity;
use Packages\Animal\Staff\LazyArchitecture\Domain\Repository\AnimalLazyArchitectureQuery;

class AnimalLazyArchitectureUseCase
{


    /**
     * @param AnimalLazyArchitectureUseCaseInput $input
     * @return AnimalLazyArchitectureUseCaseOutput
     */
    public function __invoke(AnimalLazyArchitectureUseCaseInput $input): AnimalLazyArchitectureUseCaseOutput
    {
        $animalEntity = (new AnimalLazyArchitectureQuery())->create(
            name: $input->getName(),
            width: $input->getWidth()
        );

        return new AnimalLazyArchitectureUseCaseOutput(
            animalEntity: $animalEntity
        );
    }
}
