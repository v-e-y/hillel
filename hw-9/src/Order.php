<?php 

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\ShawarmaCalculator;

class Order
{
    private int $orderNumber;
    private array $orderItemsList;
    private float $orderItemsCostSum;
    private float $discount;
    private float $orderTotal;

    // order schema
    /*
    [
        orderItems [
            [
                title => '', 
                ingredients =>[],  
                cost => 75
            ],
            [
                title => '', 
                ingredients =>[],  
                cost => 75
            ]
        ]
        'itemsCostSum' => float,
        'discount' => \Discount(\User, \Order),
        'total' => float
    ]
     */

    public function __construct()
    {
        $this->orderNumber = random_int(0, 100);
    }

    public function addOrderItem(array $orderIem): void
    {
        $orderList['orderItems'] = $orderIem;
    }

    public function setOrderItemsCostSum(): void
    {
        $this->orderItemsCostSum = ShawarmaCalculator::price($this);
    }

    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    public function getOrderItemsList(): array
    {
        return $this->orderItemsList['orderItems'];
    }
}