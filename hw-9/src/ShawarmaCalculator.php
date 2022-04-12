<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;
use Hillel\Hw9\Shawarma\Order;


final class ShawarmaCalculator
{
    protected Shawarma $orderedShawarma;
    protected array $order;

    // Add Shawarma to order
    public static function add(Shawarma $shawarma, Order $order): bool
    {

    }

    // Return shawerma ingredients which added to order
    public static function getIngredients(Shawarma $shawarma): string
    {

    }

    // Return ordered shawerma price
    public function price(Shawarma $shawarma): float
    {

    }
}