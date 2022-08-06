<?php

declare(strict_types=1);

namespace Hillel\Entities;

use Hillel\Casts\ArrayCast;
use Hillel\Casts\MoneyCast;
use Hillel\Casts\DateTimeCast;

class Product
{
    private float $price;

    private string $attributes;

    private int $updatedAt;

    protected array $casts = [
        'price' => MoneyCast::class,
        'attributes' => ArrayCast::class,
        'updatedAt' => DateTimeCast::class,
    ];

    public function __construct(
        $price,
        $attributes,
        $updatedAt
    )
    {
        $this->price = $price;
        $this->attributes = $attributes;
        $this->updatedAt = $updatedAt;
    }

    public function __set($variable, $value)
    {
        if ($this->inCasts($variable)) {
            $this->$variable = $this->casts[$variable]::set($value);
        }
    }

    public function __get($variable)
    {
        if ($this->inCasts($variable)) {
            return $this->casts[$variable]::get($this->$variable);
        }
    }

    private function inCasts(string $property): bool
    {
        return array_key_exists($property, $this->casts);
    }

    public function __toString(): string
    {
        return print_r($this->attributes, true);
    }
}
