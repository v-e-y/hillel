<?php

declare(strict_types=1);

namespace hillel\hw7;


class Currency
{
    private string $isoCode;

    // $currencyIsoCode: USD, EUR
    public function __construct(string $currencyIsoCode)
    {
        
    }

    public function setIsoCode(string $isoCode): void
    {
        $this->isoCode = $isoCode;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

}