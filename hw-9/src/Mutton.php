<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;


final class Mutton extends Shawarma
{
    private string $title = 'Шаурма из Баранины';

    protected float $coast = Shawarma::COAST;

    private array $ingredients = [
        'острый соус',
        'огурцы маринованные',
        'кинза',
        'помидоры свежие',
        'маринованный лук с барбарисом и зеленью',
        'мясо баранины',
        'лаваш арабский'
    ];
}