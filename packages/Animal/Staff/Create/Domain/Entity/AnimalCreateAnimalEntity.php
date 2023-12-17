<?php

namespace Packages\Animal\Staff\Create\Domain\Entity;

class AnimalEntity
{
    public function __construct(
        private readonly ?int    $id,
        private readonly string $name,
        private readonly float  $width
    )
    {
    }

    /**
     * ID
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 名前
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 体長
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }
}
