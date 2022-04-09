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

    protected $casts = [
        'price' => MoneyCast::class,
        'attributes' => ArrayCast::class,
        'updatedAt' => DateTimeCast::class,
    ];

    public function __construct($price, $attributes, $updatedAt)
    {
        $this->price = $price;
        $this->attributes = $attributes;
        $this->updatedAt = $updatedAt;
    }

    public function __set($variable, $value)
    {
        $this->$variable = $this->casts[$variable]::set($value);
    }

    public function __get($variable)
    {
        return $this->casts[$variable]::get($this->$variable);
    }
    
    public function __toString(): string
    {
        $productAttributes = '';
        foreach (ArrayCast::get($this->attributes) as $key => $value) {
            $productAttributes .= ' ' . $key . ' - ' . $value;
            if ($key === array_key_last(ArrayCast::get($this->attributes))) {
                $productAttributes .= '.';
            } else {
                $productAttributes .= ',';
            }
        }

        return '<strong>Product price</strong> - ' . MoneyCast::get($this->price) . '<br>'
            . '<strong>Attributes</strong>: ' . $productAttributes . '<br>'
            . '<strong>And created or updated</strong>: ' . DateTimeCast::get($this->updatedAt);
    }
    
}
