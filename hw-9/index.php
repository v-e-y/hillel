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

// Create new order
$order = new Order;

// Rewrite ingredients
$beefShaw->setIngredients(['meet', 'bread', 'sous']);

// Add items to the order
ShawarmaCalculator::add($order, $odesaShaw);
ShawarmaCalculator::add($order, $muttonShaw);
ShawarmaCalculator::add($order, $beefShaw);


echo '<pre>';
print_r($odesaShaw);
print_r($beefShaw);
print_r($muttonShaw);
print_r($order);
print_r(ShawarmaCalculator::price($order));
echo PHP_EOL;
print_r(ShawarmaCalculator::getIngredients($order));
echo '<pre>';



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
    'itemsCostSum' => 100500,
    'discount' => 50, // \Discount(\User, \Order),,
    'total' => 100450
];
*/

