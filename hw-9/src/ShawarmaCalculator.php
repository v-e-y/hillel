<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\Shawarma;
use Hillel\Hw9\Shawarma\Order;


final class ShawarmaCalculator
{
    // protected Shawarma $orderedShawarma;
    // private Order $order;
    /*
    public function __construct(Shawarma $shawarma, Order $order)
    {
        $this->orderedShawarma = $shawarma;
        $this->order = $order;
    }
    */

    /**
     * Add new item (shawarma) to the order 
     *
     * @param Order $order
     * @param Shawarma $shawarmaToOrder // Shawarma which need to add to the order
     * @return void
     */
    public static function add(Order $order, Shawarma $shawarmaToOrder)
    {
        $order->addOrderItem([
            'title' => $shawarmaToOrder->getTitle(),
            'ingredients' => $shawarmaToOrder->getIngredients(),
            'cost' => $shawarmaToOrder->getCost()
        ]);
    }

    /**
     * Just returns all shawarma ingredients
     *
     * @param Shawarma $shawarmaToOrder
     * @return array // All shawarma ingredients
     */
    public static function getIngredients(Shawarma $shawarmaToOrder): array
    {
        return $shawarmaToOrder->getIngredients();
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
}