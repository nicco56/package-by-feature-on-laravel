<?php

namespace Packages\Animal\EndUser\GetAnimal\Adaptor;


use Illuminate\Http\JsonResponse;
use Packages\Animal\EndUser\GetAnimal\Domain\Entity\AnimalEntity;

class AnimalGetControllerOutput
{
    /**
     * @param AnimalEntity|null $animalEntity
     */
    public function __construct(private readonly ?AnimalEntity $animalEntity)
    {
    }

    /**
     * @return JsonResponse
     */
    public function getJsonResponse(): JsonResponse
    {
        $data['animal'] = $this->animalEntity ? [
            'id'    => $this->animalEntity->getId(),
            'name'  => $this->animalEntity->getName(),
            'width' => $this->animalEntity->getWidth(),
        ] : null;

        return new JsonResponse($data, 200);
    }
}
