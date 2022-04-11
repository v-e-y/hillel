<?php 

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

use Hillel\Hw9\Shawarma\ShawarmaCalculator;

class Order
{
    private int $orderNumber = random_int(0, 100);
    private array $orderItemsList; // [item_1 => [ingredients =>[], title => '', coast => 75], item_2...]

    public function __construct(ShawarmaCalculator $orderDetails)
    {
        $this->orderList = $orderDetails->getDetails();
    }

    public function addOrderItem(Shawarma $shawarma): bool
    {

    }
}