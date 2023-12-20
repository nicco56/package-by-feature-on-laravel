<?php

namespace Packages\Animal\Staff\Create\Domain\Repository\DB;

use App\Models\Animal;
use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;
use Packages\Animal\Staff\Create\Domain\Repository\AnimalCreateCommandInterface;

class AnimalCreateCommand implements AnimalCreateCommandInterface
{
    public function create(string $name, int $width): AnimalCreateAnimalEntity
    {
        $animalModel = Animal::create([
            'name'  => $name,
            'width' => $width,
        ]);

        return new AnimalCreateAnimalEntity(
            id: $animalModel->id,
            name: $animalModel->name,
            width: $animalModel->width,
        );
    }
}
