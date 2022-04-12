<?php 

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\ShawarmaCalculator;

class Order
{
    private int $orderNumber;
    private array $orderItemsList;

    // order items schema
    /*
    [
        orderItems [
            item_1 => [
                title => '', 
                ingredients =>[],  
                coast => 75
            ],
            item_2 => [
                title => '', 
                ingredients =>[],  
                coast => 75
            ]
            'itemsCostSum' => float,
            'discount' => \Discount(\User, \Order),
            'total' => float
        ]
    ]
     */

    private float $orderItemCostSum;

    private float $discount;

    private float $orderTotal;

    public function __construct()
    {
        $this->orderNumber = random_int(0, 100);
    }

    public function addOrderItem(Shawarma $shawarma): void
    {
        $orderList[count($this->orderItemsList) + 1] = [
            'title' => $shawarma->getTitle(),
            'ingredients' => $shawarma->getIngredients(),
            'coast' => $shawarma->getCost()
        ];
    }

    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    public function getOrder(): array
    {
        return $this->orderItemsList;
    }
}