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
        // 動物を作成
        $createdAnimalEntity = $this->animalCreateQuery->create(
            name: $input->getName(),
            width: $input->getWidth(),
        );

        // UseCaseのOutputを作成し、返す
        return new AnimalCreateUseCaseOutput(
            animalEntity: $createdAnimalEntity
        );
    }
}
