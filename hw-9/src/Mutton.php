<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;

final class Mutton extends Shawarma
{
    // Default shawarma name
    protected string $title = 'Шаурма из Баранины';

    // Default shawarma cost
    protected float $cost = 85;

    // Default ingredients
    protected array $ingredients = [
        'острый соус',
        'огурцы маринованные',
        'кинза',
        'помидоры свежие',
        'маринованный лук с барбарисом и зеленью',
        'мясо баранины',
        'лаваш арабский'
    ];
}
