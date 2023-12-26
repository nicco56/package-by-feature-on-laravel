<?php

namespace Packages\Animal\Staff\LazyArchitecture\UseCase;

class AnimalLazyArchitectureUseCaseInput
{
    public function __construct(
        private readonly string $name,
        private readonly int  $width,
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
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }
}
