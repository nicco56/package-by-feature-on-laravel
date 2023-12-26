<?php

namespace Packages\Animal\Staff\LazyArchitecture\Domain\Repository;

use App\Models\Animal;
use Packages\Animal\Staff\LazyArchitecture\Domain\Entity\AnimalLazyArchitectureAnimalEntity;

class AnimalLazyArchitectureQuery
{
    public function create(string $name, int $width): AnimalLazyArchitectureAnimalEntity
    {
        $animalModel = Animal::create([
            'name' => $name,
            'width' => $width,
        ]);

        return new AnimalLazyArchitectureAnimalEntity(
            id: $animalModel->id,
            name: $animalModel->name,
            width: $animalModel->width,
        );
    }
}
