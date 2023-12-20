<?php

namespace Packages\Animal\Staff\Create\UseCase;

class AnimalCreateUseCaseInput
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
     * @return float
     */
    public function getWidth(): int
    {
        return $this->width;
    }
}
