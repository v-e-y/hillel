<?php

declare(strict_types=1);

ini_set('display_errors', '1'); 
ini_set('display_startup_errors', '1'); 
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


use hillel\hw7\Currency;
use hillel\hw7\Money;

echo '<pre>';


$USDCurrency = new Currency('USD');
$UAHCurrency = new Currency('UAH');


if ($USDCurrency->equals($UAHCurrency->getIsoCode())) {
    echo 'Iso codes are equal' . PHP_EOL;
} else {
    echo 'Iso codes non equal' . PHP_EOL;
}

$moneyOne = new Money(1.5, new Currency('USD'));
$moneyTwo = new Money(45, new Currency('USD'));

if ($moneyOne->equals($moneyTwo)) {
    echo 'Money codes and amount are <strong>equal</strong>' . PHP_EOL;
} else {
    echo 'Money codes or amount <strong>non</strong> equal' . PHP_EOL;
}

$moneyThree = $moneyOne->add($moneyTwo);


print_r($moneyThree);

