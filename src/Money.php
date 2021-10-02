<?php

namespace Kane;

/**
 * Money class
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @psalm-immutable
 * @template C of Currency
 */
class Money
{
    /** @psalm-suppress MutableDependency */
    use MoneyCalculator;

    /** @var numeric-string */
    private string $amount;

    private Currency $currency;

    /** @var int */
    private int $scale;

    /**
     * @param numeric-string $amount
     * @psalm-param C $currency
     */
    final public function __construct(string $amount, Currency $currency, int $scale)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->scale  = $scale;
    }

    /**
     * @return static
     * @psalm-param Money<C> $object
     * @psalm-return Money<C>
     * @throws \Kane\Currency\DifferenceException
     * @throws \Kane\Currency\ScaleMismatchException
     */
    public function add(Money ...$object)
    {
        return static::eval('+', $this, ...$object);
    }

    /**
     * @return static
     * @psalm-param Money<C> $object
     * @psalm-return Money<C>
     * @throws \Kane\Currency\DifferenceException
     * @throws \Kane\Currency\ScaleMismatchException
     */
    public function sub(Money ...$object)
    {
        return static::eval('-', $this, ...$object);
    }

    /**
     * @return static
     * @psalm-param Money<C> $object
     * @psalm-return Money<C>
     * @throws \Kane\Currency\DifferenceException
     * @throws \Kane\Currency\ScaleMismatchException
     */
    public function mul(Money ...$object)
    {
        return static::eval('*', $this, $object);
    }

    /**
     * @return numeric-string
     */
    public function __toString()
    {
        return $this->amount;
    }
}
