<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;


class Shawarma
{
   // Minimal default price
   const  COAST = 65;

   public function setCoast(float $coast): void
   {
      if ($coast < Shawarma::COAST) {
         throw new \Exception('Coast for ' . $this::class . 'should be more or equal minimal \Shawarma coast');
      }
      $this->coast = $coast;
   }

   /**
    * Returns shawarma coast
    *
    * @return float // Shawarma prise
    */
   public function getCost(): float
   {
      return $this->coast;
   }

   public function getIngredients(): array
   {
      return $this->ingredients;
   }

   public function getTitle(): string
   {
      return $this->title;
   }
}