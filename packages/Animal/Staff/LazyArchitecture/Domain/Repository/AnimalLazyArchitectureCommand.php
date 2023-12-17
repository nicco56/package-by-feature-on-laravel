<?php

namespace Packages\Animal\Staff\LazyArchitecture\Domain\Repository;

use App\Models\Animal;
use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalEntity;

class AnimalLazyArchitectureCommand
{
    public function create(AnimalEntity $animalEntity): AnimalEntity
    {
        $result = Animal::LazyArchitecture([
            'name'  => $animalEntity->getName(),
            'width' => $animalEntity->getWidth(),
        ]);

        return $this->convertToEntity($result);
    }

    private function convertToEntity(Animal $obj): AnimalEntity
    {
        return new AnimalEntity(
            id: $obj->id,
            name: $obj->name,
            width: $obj->width ?? 0.00,
        );
    }
}
