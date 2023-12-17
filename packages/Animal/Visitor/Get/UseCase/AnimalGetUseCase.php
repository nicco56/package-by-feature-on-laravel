<?php

namespace Packages\Animal\EndUser\AnimalGet\UseCase;


use Packages\Animal\EndUser\AnimalGet\Domain\Repository\AnimalGetQueryInterface;

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
        $animalEntity = $this->animalGetQuery->animalGet($input->getId());

        // UseCaseのOutputを作成し、返す
        return new AnimalGetUseCaseOutput(['animalEntity' => $animalEntity]);
    }
}
