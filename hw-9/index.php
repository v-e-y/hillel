<?php

declare(strict_types=1);


require_once $_SERVER['DOCUMENT_ROOT'] . './vendor/autoload.php';


use Hillel\Hw9\Shawarma\Shawarma;
use Hillel\Hw9\Shawarma\Odesa;
use Hillel\Hw9\Shawarma\Beef;
use Hillel\Hw9\Shawarma\Mutton;
use Hillel\Hw9\Shawarma\Order;

/**
 * Create new obj some shawarma
 * Create new Order 
 * Add shawarma to the order
 * 
 */

$beefS = new Beef;

$beefS->setCoast(82);

$beefS->setIngredients([
    'afgdsfgDFGDFG',
    '/>,-><br>zdfD',
    '_#$^$%&@!#$GF',
    'test <?php',
    'test'
]);

echo '<pre>';


print_r($beefS->getIngredients());


/*

$order = new Order();

$order->addNewItem(Shawarama);

*/

