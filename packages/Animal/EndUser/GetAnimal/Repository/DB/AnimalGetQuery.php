<?php

namespace Packages\Animal\EndUser\GetAnimal\Repository\DB;

use App\Eloquent\Animal;
use Packages\Animal\EndUser\GetAnimal\Domain\Entity\AnimalEntity;
use Packages\Animal\EndUser\GetAnimal\Repository\AnimalGetQueryInterface;

class AnimalGetQuery implements AnimalGetQueryInterface
{
    public function getAnimal(int $id): ?AnimalEntity
    {
        // Eloquentで取得（Laravel依存）
        $result = Animal::where(['id' => $id])->first();

        if ($result) {
            return $this->convertToEntity($result);
        }
        return null;
    }

    private function convertToEntity(Animal $obj): AnimalEntity
    {
        return new AnimalEntity(
            (int)$obj->id,
            (string)$obj->name,
            (float)$obj->width ?? 0.00,
        );
    }
}
