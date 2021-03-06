<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;

final class Odesa extends Shawarma
{
    // Default shawarma name
    protected string $title = 'Шаурма Одесская';

    // Default shawarma cost
    protected float $cost = 69;

    // Default ingredients
    protected array $ingredients = [
        'огурцы маринованные',
        'картофель жареный',
        'чесночный соус',
        'тандырный лаваш',
        'маринованный лук с барбарисом и зеленью',
        'мясо куриное',
        'салат коул слоу',
        'корейская морковь'
    ];
}
