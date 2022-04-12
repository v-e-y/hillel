<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;


class Shawarma
{
   // Minimal default price
   const  COAST = 65;

   /**
    * Set shawarma coast
    *
    * @param float $coast // Shawarma coast
    * @return void
    */
   public function setCoast(float $coast): void
   {
      if ($coast < Shawarma::COAST) {
         throw new \Exception('Coast for ' . __CLASS__ . ' should be more or equal minimal \Shawarma coast');
      }
      $this->coast = $coast;
   }

   /**
    * Rewrite all ingredients
    *
    * @param array $ingredients // New shawarma ingredients
    * @return void
    */
   public function setIngredients(array $ingredients): void
   {
      $this->ingredients = array_unique(array_map(function($ingItem) {
         return strtolower(trim(htmlspecialchars($ingItem)));
      }, $ingredients));
   }

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