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
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    /**
     * Comparison of parameters of two \Money objects.
     *
     * @param Money $money
     * @return boolean
     */
    public function equals(Money $money): bool
    {
        return $this == $money;
    }

    /**
     * Combine two objects into another object
     *
     * @param Money $money
     * @return Money // New one
     */
    public function add(Money $money): Money
    {
        if ($this->currency->getIsoCode() != $money->currency->getIsoCode()) {
            throw new \Exception("If you want to add two types of money they must have the same iso code");
        }

        return new Money($this->amount + $money->amount, new Currency($this->currency->getIsoCode()));
    }

    /**
     * Checks the type of amount
     *
     * @param [int/float] $amount
     * @return boolean
     */
    public static function checkAmountType($amount): bool
    {
        if (is_int($amount) || is_float($amount)) {
            return true;
        }

        throw new \Exception("amount type must be integer or float");
    }

    /**
     * Setters
     */

    public function setAmount($amount): void
    {
        if (Money::checkAmountType($amount)) {
            $this->amount = $amount;
        }
    }

    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Getters
     */

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency->getCurrency();
    }

}