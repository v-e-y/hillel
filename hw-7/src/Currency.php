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

    public function setIsoCode(string $isoCode): void
    {
        // Check code and create currency object. If code is wrong return Exception.
        $currency = MoneyCurrency::of($isoCode);
        // Write currency iso code
        $this->isoCode = $currency->getCurrencyCode();
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

}