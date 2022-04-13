<?php

declare(strict_types=1);

namespace Hillel\Hw9\Shawarma;

class Shawarma
{
   /**
    * Set shawarma coast
    *
    * @param float $coast // Shawarma coast
    * @return void
    */
   public function setCost(float $cost): void
   {
      $this->cost = $cost;
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
      return $this->cost;
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
