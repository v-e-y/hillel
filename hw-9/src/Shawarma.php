<?php

declare(strict_types=1);

abstract class Shawarma
{
   /**
    * @return float
    */
   abstract public function getCost(): float;

   /**
    * @return array
    */
   abstract public function getIngredients(): array;

   /**
    * @return string
    */
   abstract public function getTitle(): string;
}