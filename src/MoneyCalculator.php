<?php

namespace Kane;

use function assert;
use function array_map;
use function array_shift;
use function array_unique;
use function array_unshift;
use function bcadd;
use function bcmul;
use function bcsub;
use function count;
use function get_class;
use function is_array;
use function is_string;
use function var_export;

/**
 * Trait MoneyCalculator
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 *
 * @psalm-immutable
 */
trait MoneyCalculator
{
    /**
     * Evaluate expression
     *
     * @pure
     * @param int|string|Money|array<int|string|Money> ...$expr
     * @return static
     */
    public static function eval(...$expr)
    {
        $operator = array_shift($expr);
        assert(is_string($operator));

        /** @var array<int|string|Money|array<int|string|Money>> $operands */
        $operands = [];

        foreach ($expr as $obj) {
            $operands[] = is_array($obj) ? self::eval(...$obj) : $obj;
        }

        return self::eval1($operator, ...$operands);
    }

    /**
     * Evaluate expression
     *
     * @pure
     * @return static
     */
    private static function eval1(string $operator, Money ...$operands)
    {
        self::assertOperands(...$operands);

        $amount = null;

        switch ($operator) {
            case '+':
                $amount = self::bcadd($operands[0]->scale, ...$operands);
                break;
            case '-':
                $amount = self::bcsub($operands[0]->scale, ...$operands);
                break;
            case '*':
                $amount = self::bcmul($operands[0]->scale, ...$operands);
                break;
        }

        assert($amount !== null);

        /** @psalm-suppress UnsafeGenericInstantiation */
        return new static($amount, $operands[0]->currency, $operands[0]->scale);
    }

    /**
     * @pure
     * @param array<Money|numeric-string> $operands
     * @return numeric-string
     */
    private static function bcadd(int $scale, ...$operands): string
    {
        switch (count($operands)) {
            case 0:
                throw new \BadMethodCallException();
            case 1:
                return (string)$operands[0];
        }

        $v1 = array_shift($operands);
        assert($v1 !== null);
        $v2 = array_shift($operands);
        assert($v2 !== null);

        array_unshift($operands, bcadd((string)$v1, (string)$v2, $scale));

        return self::bcadd($scale, ...$operands);
    }

    /**
     * @pure
     * @param array<Money|numeric-string> $operands
     * @return numeric-string
     */
    private static function bcsub(int $scale, ...$operands): string
    {
        switch (count($operands)) {
            case 0:
                throw new \BadMethodCallException();
            case 1:
                return bcmul((string)$operands[0], '-1', $scale);
        }

        $v1 = array_shift($operands);
        assert($v1 !== null);
        $v2 = array_shift($operands);
        assert($v2 !== null);

        array_unshift($operands, bcsub((string)$v1, (string)$v2, $scale));

        if (count($operands) < 2) {
            return (string)$operands[0];
        }

        return self::bcsub($scale, ...$operands);
    }

    /**
     * @pure
     * @param array<Money|numeric-string> $operands
     * @return numeric-string
     */
    private static function bcmul(int $scale, ...$operands): string
    {
        switch (count($operands)) {
            case 0:
                throw new \BadMethodCallException();
            case 1:
                return (string)$operands[0];
        }

        $v1 = array_shift($operands);
        assert($v1 !== null);
        $v2 = array_shift($operands);
        assert($v2 !== null);

        array_unshift($operands, bcmul((string)$v1, (string)$v2, $scale));

        return self::bcmul($scale, ...$operands);
    }

    /**
     * @pure
     */
    private static function assertOperands(Money ...$operands): void
    {
        $currencies = [];
        foreach ($operands as $obj) {
            $currencies[] = get_class($obj->currency);
        }
        if (count(array_unique($currencies)) !== 1) {
            throw new Currency\DifferenceException(var_export(array_map(null, $operands, $currencies), true));
        }

        $scales = [];
        foreach ($operands as $obj) {
            $scales[] = $obj->scale;
        }
        if (count(array_unique($scales)) !== 1) {
            throw new Currency\ScaleMismatchException(var_export(array_map(null, $operands, $scales), true));
        }
    }
}
