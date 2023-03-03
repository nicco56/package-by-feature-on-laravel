<?php

namespace Packages\Animal\Admin\AnimalCreate\UseCase;


use Packages\Animal\Admin\AnimalCreate\Domain\Entity\AnimalEntity;
use Packages\Animal\Admin\AnimalCreate\Domain\Repository\AnimalCreateCommandInterface;

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
        $inputAnimalEntity = new AnimalEntity(
            null,
            $input->getName(),
            $input->getWidth(),
        );

        // 作成した動物
        $createdAnimalEntity = $this->animalCreateQuery->AnimalCreate($inputAnimalEntity);

        // UseCaseのOutputを作成し、返す
        return new AnimalCreateUseCaseOutput(['animalEntity' => $createdAnimalEntity]);
    }
}
