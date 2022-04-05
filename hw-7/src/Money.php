<?php

declare(strict_types=1);

namespace hillel\hw7;

use hillel\hw7\Currency as Currency;


class Money
{
    private $amount;
    private $currency;

    public function __construct($amount, Currency $currency)
    {
        
    }

    public function equals(Money $money): bool
    {

    }

    public function add(Money $money): Money
    {

    } 

    /**
     * Setters
     */

    public function setAmount(): void
    {

    }

    public function setCurrency(): void
    {

    }

    /**
     * Getters
     */

    public function getAmount()
    {

    }

    public function getCurrency(): string
    {

    }

}