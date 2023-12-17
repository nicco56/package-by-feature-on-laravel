<?php

namespace Packages\Animal\EndUser\AnimalGet\UseCase;

class AnimalGetUseCaseInput
{
    public function __construct(
        private readonly int $id
    )
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
