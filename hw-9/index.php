<?php

declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT'] . './vendor/autoload.php';

use Hillel\Hw9\Shawarma\Odesa;
use Hillel\Hw9\Shawarma\Beef;
use Hillel\Hw9\Shawarma\Mutton;
use Hillel\Hw9\Shawarma\Order;
use Hillel\Hw9\Shawarma\ShawarmaCalculator;

// Create Shawarma obj.
$odesaShaw = new Odesa;
$beefShaw = new Beef;
$muttonShaw = new Mutton;

// Add non default prise to some obj.
$beefShaw->setCost(75);
$muttonShaw->setCost(82.50);




echo '<pre>';








print_r($odesaShaw);
print_r($beefShaw);
print_r($muttonShaw);



/*
$arrEx = [
    'orderItems' => [
        [
            'title' => 'hjjhkl', 
            'ingredients' => [],  
            'cost' => 65
        ],
        [
            'title' => 'adfgsdfg', 
            'ingredients' => [],  
            'cost' => 75
        ]
    ],
    'itemsCostSum' => 100,
    'discount' => 10, // \Discount(\User, \Order),,
    'total' => 100
];
*/

