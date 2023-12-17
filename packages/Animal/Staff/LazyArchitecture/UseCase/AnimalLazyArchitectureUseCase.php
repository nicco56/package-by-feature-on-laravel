<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;


use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalLazyArchitectureAnimalEntity;
use Packages\Animal\Staff\LazyArchitecture\Domain\Repository\AnimalLazyArchitectureCommand;

class AnimalLazyArchitectureUseCase
{


    /**
     * @param AnimalLazyArchitectureUseCaseInput $input
     * @return AnimalLazyArchitectureUseCaseOutput
     */
    public function __invoke(AnimalLazyArchitectureUseCaseInput $input): AnimalLazyArchitectureUseCaseOutput
    {
        // 作成する動物
        $inputAnimalEntity = new AnimalLazyArchitectureAnimalEntity(
            id: null,
            name: $input->getName(),
            width: $input->getWidth(),
        );

        // 作成した動物
        $animalEntity = (new AnimalLazyArchitectureCommand())->create(
            animalEntity: $inputAnimalEntity
        );

        // UseCaseのOutputを作成し、返す
        return new AnimalLazyArchitectureUseCaseOutput(
            animalEntity: $animalEntity
        );
    }
}
