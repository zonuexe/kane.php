<?php

/**
 * Functions for Kane.  Idol time is money.
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Kane;

function EUR(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\EUR::getInstance(), $scale);
}

function JPY(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\JPY::getInstance(), $scale);
}

function USD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\USD::getInstance(), $scale);
}
