<?php

namespace Packages\Animal\EndUser\AnimalGet\Domain\Repository\DB;

use App\Eloquent\Animal;
use Packages\Animal\EndUser\AnimalGet\Domain\Entity\AnimalEntity;
use Packages\Animal\EndUser\AnimalGet\Domain\Repository\AnimalGetQueryInterface;

class AnimalGetQuery implements AnimalGetQueryInterface
{
    public function AnimalGet(int $id): ?AnimalEntity
    {
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
