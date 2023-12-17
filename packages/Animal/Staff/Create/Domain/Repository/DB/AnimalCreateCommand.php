<?php

namespace Packages\Animal\Staff\Create\Domain\Repository\DB;

use App\Models\Animal;
use Packages\Animal\Staff\Create\Domain\Entity\AnimalCreateAnimalEntity;
use Packages\Animal\Staff\Create\Domain\Repository\AnimalCreateCommandInterface;

class AnimalCreateCommand implements AnimalCreateCommandInterface
{
    public function create(AnimalCreateAnimalEntity $animalEntity): AnimalCreateAnimalEntity
    {
        $result = Animal::create([
            'name'  => $animalEntity->getName(),
            'width' => $animalEntity->getWidth(),
        ]);

        return $this->convertToEntity($result);
    }

    private function convertToEntity(Animal $obj): AnimalCreateAnimalEntity
    {
        return new AnimalCreateAnimalEntity(
            id: $obj->id,
            name: $obj->name,
            width: $obj->width ?? 0.00,
        );
    }
}
