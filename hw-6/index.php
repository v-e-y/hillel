<?php 

declare(strict_types=1);

require $_SERVER['DOCUMENT_ROOT'] . './vendor/Autoloader.php';

$autoloader = new \vendor\AutoLoader;

$autoloader->register();

$autoloader->setBaseDir($_SERVER['DOCUMENT_ROOT']);
$autoloader->addNamespase('hillel\hw6\Views', 'src\Views');
$autoloader->addNamespase('hillel\hw6\Controllers', 'src\Controllers');


$testController = new \hillel\hw6\Controllers\MainController;
$testView = new \hillel\hw6\Views\MainView;

echo $testView->show($testController);