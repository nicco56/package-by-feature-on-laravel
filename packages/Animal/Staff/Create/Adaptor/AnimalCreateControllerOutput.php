<?php

namespace Packages\Animal\Staff\Create\Adaptor;


use Illuminate\Http\JsonResponse;
use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;

class AnimalCreateControllerOutput
{
    /**
     * @param AnimalCreateAnimalEntity $animalEntity
     */
    public function __construct(private readonly AnimalCreateAnimalEntity $animalEntity)
    {
    }

    /**
     * @return JsonResponse
     */
    public function getJsonResponse(): JsonResponse
    {
        $data['animal'] = [
            'id'    => $this->animalEntity->getId(),
            'name'  => $this->animalEntity->getName(),
            'width' => $this->animalEntity->getWidth(),
        ];

        return new JsonResponse($data, 200);
    }
}
