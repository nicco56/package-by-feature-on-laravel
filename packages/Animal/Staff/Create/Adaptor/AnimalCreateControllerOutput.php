<?php

namespace Packages\Animal\Admin\AnimalCreate\Adaptor;


use Illuminate\Http\JsonResponse;
use Packages\Animal\Admin\AnimalCreate\Domain\Entity\AnimalEntity;

class AnimalCreateControllerOutput
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
