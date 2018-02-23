<?php

namespace Kane;

/**
 * Money class
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class Money
{
    use MoneyCalculator;

    /** @var string */
    private $amount;

    /** @var Currency */
    private $currency;

    /** @var int */
    private $scale;

    public function __construct(string $amount, Currency $currency, int $scale)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->scale  = $scale;
    }

    /**
     * @param \Kane\Money $object
     * @return static
     * @throws \Kane\Currency\DifferenceException
     */
    public function add(Money ...$object)
    {
        return static::eval(array_merge(['+', $this], $object));
    }

    /**
     * @param \Kane\Money $object
     * @return static
     * @throws \Kane\Currency\DifferenceException
     */
    public function sub(Money ...$object)
    {
        return static::eval(array_merge(['-', $this], $object));
    }

    /**
     * @param \Kane\Money $object
     * @return static
     * @throws \Kane\Currency\DifferenceException
     */
    public function mul(Money ...$object)
    {
        return static::eval(array_merge(['*', $this], $object));
    }

    public function __toString()
    {
        return $this->amount;
    }
}
