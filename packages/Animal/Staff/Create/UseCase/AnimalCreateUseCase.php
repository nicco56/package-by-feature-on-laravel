<?php

namespace Packages\Animal\Staff\Create\UseCase;


use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;
use Packages\Animal\Staff\Create\Domain\Repository\AnimalCreateCommandInterface;

class AnimalCreateUseCase
{
    /**
     * @param AnimalCreateCommandInterface $animalCreateQuery
     */
    public function __construct(
        private readonly AnimalCreateCommandInterface $animalCreateQuery
    )
    {
    }

    /**
     * @param AnimalCreateUseCaseInput $input
     * @return AnimalCreateUseCaseOutput
     */
    public function __invoke(AnimalCreateUseCaseInput $input): AnimalCreateUseCaseOutput
    {
        // 作成する動物
        $inputAnimalEntity = new AnimalCreateAnimalEntity(
            id: null,
            name: $input->getName(),
            width: $input->getWidth(),
        );

        // 作成した動物
        $createdAnimalEntity = $this->animalCreateQuery->create(
            animalEntity: $inputAnimalEntity
        );

        // UseCaseのOutputを作成し、返す
        return new AnimalCreateUseCaseOutput(
            animalEntity: $createdAnimalEntity
        );
    }
}
