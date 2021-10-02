<?php

/**
 * Functions for Kane.  Idol time is money.
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Kane;

use Kane\Currency;

/**
 * Australian dollar ($)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\AUD>
 */
function AUD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\AUD::getInstance(), $scale);
}

/**
 * Swiss franc
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\CHF>
 */
function CHF(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\CHF::getInstance(), $scale);
}

/**
 * Renminbi, Chinese yuan (¥)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\CNY>
 */
function CNY(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\CNY::getInstance(), $scale);
}

/**
 * Euro (€)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\EUR>
 */
function EUR(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\EUR::getInstance(), $scale);
}

/**
 * Pound sterling (£)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\GBP>
 */
function GBP(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\GBP::getInstance(), $scale);
}

/**
 * Japanese yen (¥)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\JPY>
 */
function JPY(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\JPY::getInstance(), $scale);
}

/**
 * South Korean won (₩)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\KRW>
 */
function KRW(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\KRW::getInstance(), $scale);
}

/**
 * Russian ruble (₽)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\RUB>
 */
function RUB(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\RUB::getInstance(), $scale);
}

/**
 * New Taiwan dollar ($)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\TWD>
 */
function TWD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\TWD::getInstance(), $scale);
}

/**
 * United States dollar ($)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\USD>
 */
function USD(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\USD::getInstance(), $scale);
}

/**
 * Vietnamese đồng (₫)
 *
 * @pure
 * @param numeric-string $amount
 * @psalm-return Money<Currency\VND>
 */
function VND(string $amount, int $scale = 10): Money
{
    return new Money($amount, Currency\VND::getInstance(), $scale);
}
