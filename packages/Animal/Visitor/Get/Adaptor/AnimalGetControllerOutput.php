<?php

namespace Packages\Animal\Visitor\Get\Adaptor;


use Illuminate\Http\JsonResponse;
use Packages\Animal\Visitor\Get\Domain\Entity\AnimalGetAnimalEntity;

class AnimalGetControllerOutput
{
    /**
     * @param AnimalGetAnimalEntity|null $animalEntity
     */
    public function __construct(private readonly ?AnimalGetAnimalEntity $animalEntity)
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
