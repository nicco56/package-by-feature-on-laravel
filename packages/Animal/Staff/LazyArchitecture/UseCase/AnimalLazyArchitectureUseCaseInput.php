<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;

class AnimalLazyArchitectureUseCaseInput
{
    public function __construct(
        private readonly string $name,
        private readonly float  $width,
    )
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }
}
