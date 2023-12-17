<?php

namespace Packages\Animal\Staff\LazyArchitecture\Adaptor;


use Illuminate\Http\JsonResponse;
use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalEntity;

class AnimalLazyArchitectureControllerOutput
{
    /**
     * @param AnimalEntity $animalEntity
     */
    public function __construct(private readonly AnimalEntity $animalEntity)
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
