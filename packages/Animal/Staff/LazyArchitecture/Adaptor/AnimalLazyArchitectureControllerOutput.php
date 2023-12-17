<?php

namespace Packages\Animal\Staff\LazyArchitecture\Adaptor;


use Illuminate\Http\JsonResponse;
use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalEntity;
use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalLazyArchitectureAnimalEntity;

class AnimalLazyArchitectureControllerOutput
{
    /**
     * @param AnimalLazyArchitectureAnimalEntity $animalEntity
     */
    public function __construct(private readonly AnimalLazyArchitectureAnimalEntity $animalEntity)
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

        return new JsonResponse($data);
    }
}
