<?php

declare(strict_types=1);

namespace hillel\hw7;

use Brick\Money\Currency as MoneyCurrency;


class Currency
{
    private $isoCode;

    public function __construct(string $currencyIsoCode)
    {
        $this->setIsoCode($currencyIsoCode);
    }

    /**
     * Compare two currency iso codes 
     *
     * @param Currency $isoCodeToCompare
     * @return boolean
     */
    public function equals(string $isoCodeToCompare): bool
    {
        return $this->isoCode === $isoCodeToCompare;
    }

    /**
     *  Accepts and checks currency iso code
     *
     * @param string $isoCode
     * @return void
     */
    public function setIsoCode(string $isoCode): void
    {
        // Check code and create currency object. If code is wrong return Exception.
        $currency = MoneyCurrency::of($isoCode);
        // Write currency iso code
        $this->isoCode = $currency->getCurrencyCode();
    }

    /**
     * Get a standard currency code according to the standard ISO 4217
     *
     * @return string // iso code
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

}