<?php

namespace Packages\Animal\Staff\LazyArchitecture\Domain\Repository;

use App\Models\Animal;
use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalLazyArchitectureAnimalEntity;

class AnimalLazyArchitectureCommand
{
    public function create(AnimalLazyArchitectureAnimalEntity $animalEntity): AnimalLazyArchitectureAnimalEntity
    {
        $result = Animal::create([
            'name' => $animalEntity->getName(),
            'width' => $animalEntity->getWidth(),
        ]);

        return $this->convertToEntity($result);
    }

    private function convertToEntity(Animal $obj): AnimalLazyArchitectureAnimalEntity
    {
        return new AnimalLazyArchitectureAnimalEntity(
            id: $obj->id,
            name: $obj->name,
            width: $obj->width ?? 0.00,
        );
    }
}
