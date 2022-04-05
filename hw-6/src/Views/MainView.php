<?php

declare(strict_types=1);

namespace hillel\hw6\Views;

use hillel\hw6\Controllers\MainController as MController;


class MainView
{
    public static function show(MController $dataToShow): string
    {
        return '<h1>' . $dataToShow->getData() . '</h1>';
    }
}
