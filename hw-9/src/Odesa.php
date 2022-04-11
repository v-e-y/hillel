<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;


final class Odesa extends Shawarma
{
    private string $title = 'Шаурма Одесская';

    //private float $coast = 60;

    private array $ingredients = [
        'огурцы маринованные',
        'картофель жареный',
        'чесночный соус',
        'тандырный лаваш',
        'маринованный лук с барбарисом и зеленью',
        'мясо куриное',
        'салат коул слоу',
        'корейская морковь'
    ];

    public function getCost(): float
    {
        
    }

    public function getIngredients(): array
    {
        
    }

    public function getTitle(): string
    {
        
    }

}