<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;


use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalEntity;
use Packages\Animal\Staff\LazyArchitecture\Domain\Repository\AnimalLazyArchitectureCommandInterface;

class AnimalLazyArchitectureUseCase
{
    /**
     * @param AnimalLazyArchitectureCommandInterface $animalLazyArchitectureQuery
     */
    public function __construct(
        private readonly AnimalLazyArchitectureCommandInterface $animalLazyArchitectureQuery
    )
    {
    }

    /**
     * @param AnimalLazyArchitectureUseCaseInput $input
     * @return AnimalLazyArchitectureUseCaseOutput
     */
    public function __invoke(AnimalLazyArchitectureUseCaseInput $input): AnimalLazyArchitectureUseCaseOutput
    {
        // 作成する動物
        $inputAnimalEntity = new AnimalEntity(
            null,
            $input->getName(),
            $input->getWidth(),
        );

        // 作成した動物
        $LazyArchitecturedAnimalEntity = $this->animalLazyArchitectureQuery->AnimalLazyArchitecture($inputAnimalEntity);

        // UseCaseのOutputを作成し、返す
        return new AnimalLazyArchitectureUseCaseOutput(['animalEntity' => $LazyArchitecturedAnimalEntity]);
    }
}
