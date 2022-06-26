<?php

declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Course_Selection\Src\CourseSelection;

$t = new CourseSelection('CS 111 F2016');
$s = new CourseSelection('CS111 2016 w');

echo $t;
echo '<br>';
echo $s;
//var_dump();