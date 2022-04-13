<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;

final class Beef extends Shawarma
{
    // Defaul Shawarma name
    protected string $title = 'Шаурма говяжья';

    //  Default shawarma cost
    protected float $cost = 75;

    // Default Shawarma ingredients
    protected array $ingredients = [
        'чесночный соус',
        'говяжий окорок',
        'огурцы маринованные',
        'маринованный лук с барбарисом и зеленью', 
        'салат коул слоу',
        'тандырный лаваш',
        'помидоры свежие',
        'хумус',
        'соус тахин'
    ];
}
