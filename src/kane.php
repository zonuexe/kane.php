<?php

/**
 * Functions for Kane.  Idol time is money.
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Kane;

function AUD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\AUD::getInstance(), $scale);
}

function CHF(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\CHF::getInstance(), $scale);
}

function CNY(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\CNY::getInstance(), $scale);
}

function EUR(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\EUR::getInstance(), $scale);
}

function GBP(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\GBP::getInstance(), $scale);
}

function JPY(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\JPY::getInstance(), $scale);
}

function KRW(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\KRW::getInstance(), $scale);
}

function RUB(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\RUB::getInstance(), $scale);
}

function TWD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\TWD::getInstance(), $scale);
}

function USD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\USD::getInstance(), $scale);
}

function VND(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\VND::getInstance(), $scale);
}
