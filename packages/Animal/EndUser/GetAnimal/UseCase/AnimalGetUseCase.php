<?php

namespace Packages\Animal\EndUser\GetAnimal\UseCase;


use Packages\Animal\EndUser\GetAnimal\Repository\AnimalGetQueryInterface;

class AnimalGetUseCase
{
    /**
     * @param AnimalGetQueryInterface $animalGetQuery
     */
    public function __construct(
        private readonly AnimalGetQueryInterface $animalGetQuery
    )
    {
    }

    /**
     * @param AnimalGetUseCaseInput $input
     * @return AnimalGetUseCaseOutput
     */
    public function __invoke(AnimalGetUseCaseInput $input): AnimalGetUseCaseOutput
    {
        // 動物取得クエリーからEntity取得
        $animalEntity = $this->animalGetQuery->getAnimal($input->getId());

        // UseCaseのOutputを作成し、返す
        return new AnimalGetUseCaseOutput(['animalEntity' => $animalEntity]);
    }
}
