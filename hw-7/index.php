<?php

declare(strict_types=1);

ini_set('display_errors', '1'); 
ini_set('display_startup_errors', '1'); 
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


use hillel\hw7\Currency;
use hillel\hw7\Money;

echo '<pre>';


$USDmoney = new Currency('USD');
$HRNmoney = new Currency('UAH');


if ($USDmoney->equals($HRNmoney->getIsoCode())) {
    echo 'iso codes is equal';
} else {
    echo 'non equal';
}