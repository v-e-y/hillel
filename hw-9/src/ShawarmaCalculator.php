<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;
use Hillel\Hw9\Shawarma\Order;


final class ShawarmaCalculator
{
    /**
     * Add new item (shawarma) to the order 
     *
     * @param Order $order
     * @param Shawarma $shawarmaToOrder // Shawarma which need to add to the order
     * @return void
     */
    public static function add(Order $order, Shawarma $shawarmaToOrder): void
    {
        $order->addOrderItem([
            'title' => $shawarmaToOrder->getTitle(),
            'ingredients' => $shawarmaToOrder->getIngredients(),
            'cost' => $shawarmaToOrder->getCost()
        ]);
    }

    /**
     * Calculates the total amount of items in the order
     *
     * @param Order $order
     * @return float // Sum of order items cost
     */
    public static function price(Order $order): float
    {
        return array_sum(array_column($order->getOrderItemsList(), 'cost'));
    }

    // "...методои ingredients для возврата списка ингредиентов без дублей" 
    // Я так зрозумів що треба повернути всі інгрідиенти з всіх шаурм одним списком*
    // Бо getIngredients вже є в класі Shawarma/
    /**
     * Returns all ingredients from all shawarma in order
     *
     * @param Shawarma $shawarmaToOrder
     * @return array // All shawarma ingredients
     */
    public static function getIngredients(Order $order): array
    {
        return array_unique(call_user_func_array('array_merge', array_column($order->getOrderItemsList(), 'ingredients')));
    }

}