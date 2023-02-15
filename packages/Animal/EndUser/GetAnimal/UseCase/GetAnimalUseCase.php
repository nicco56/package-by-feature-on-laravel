<?php

namespace Packages\Animal\EndUser\GetAnimal\UseCase;


use Packages\Animal\EndUser\GetAnimal\Repository\GetAnimalQueryInterface;

class GetAnimalUseCase
{
    /**
     * @param GetAnimalQueryInterface $GetAnimalQuery
     */
    public function __construct(
        private readonly GetAnimalQueryInterface $GetAnimalQuery
    )
    {
    }

    /**
     * @param GetAnimalUseCaseInput $input
     * @return GetAnimalUseCaseOutput
     */
    public function __invoke(GetAnimalUseCaseInput $input): GetAnimalUseCaseOutput
    {
        // 動物取得クエリーからEntity取得
        $animalEntity = $this->GetAnimalQuery->getAnimal($input->getId());

        // UseCaseのOutputを作成し、返す
        return new GetAnimalUseCaseOutput(['animalEntity' => $animalEntity]);
    }
}
