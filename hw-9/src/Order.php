<?php 

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\ShawarmaCalculator;

class Order
{
    private int $orderNumber;
    private array $order;
    private float $orderItemsCostSum;
    // private float $discount;
    // private float $orderTotal;

    public function __construct()
    {
        $this->orderNumber = random_int(0, 100);
    }

    public function addOrderItem(array $orderItem): void
    {
        $this->order['orderItems'][] = $orderItem;
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
        return $this->order['orderItems'];
    }
}
