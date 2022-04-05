<?php 

declare(strict_types=1);

ini_set('display_errors', '1'); 
ini_set('display_startup_errors', '1'); 
error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . './vendor/Autoloader.php';

$autoloader = new \vendor\AutoLoader;

$autoloader->register();

$autoloader->setBaseDir($_SERVER['DOCUMENT_ROOT']);
$autoloader->addNamespase('hillel\hw6\Views', 'src\Views');
$autoloader->addNamespase('hillel\hw6\Controllers', 'src\Controllers');

use \hillel\hw6\Controllers\MainController as MainController;

$testController = new MainController;
$testView = new \hillel\hw6\Views\MainView;

echo $testView->show($testController);


echo '<br> <pre>';
//print_r($autoloader->getBaseDir());

// print_r($autoloader);

//print_r($test);
