<?php

namespace Packages\Animal\Admin\AnimalCreate\Domain\Repository\DB;

use App\Eloquent\Animal;
use Packages\Animal\Admin\AnimalCreate\Domain\Entity\AnimalEntity;
use Packages\Animal\Admin\AnimalCreate\Domain\Repository\AnimalCreateCommandInterface;

class AnimalCreateCommand implements AnimalCreateCommandInterface
{
    public function AnimalCreate(AnimalEntity $animalEntity): AnimalEntity
    {
        $result = Animal::create([
            'name'  => $animalEntity->getName(),
            'width' => $animalEntity->getWidth(),
        ]);

        return $this->convertToEntity($result);
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
