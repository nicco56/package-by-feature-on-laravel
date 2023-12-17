<?php

namespace Packages\Animal\Visitor\Get\Domain\Repository\DB;

use App\Models\Animal;
use Packages\Animal\Visitor\Get\Domain\Entity\AnimalGetAnimalEntity;
use Packages\Animal\Visitor\Get\Domain\Repository\AnimalGetQueryInterface;

class AnimalGetQuery implements AnimalGetQueryInterface
{
    public function animalGet(int $id): ?AnimalGetAnimalEntity
    {
        $result = Animal::where(['id' => $id])->first();

        if ($result) {
            return $this->convertToEntity($result);
        }
        return null;
    }

    private function convertToEntity(Animal $obj): AnimalGetAnimalEntity
    {
        return new AnimalGetAnimalEntity(
            id: $obj->id,
            name: $obj->name,
            width: $obj->width ?? 0.00,
        );
    }
}
