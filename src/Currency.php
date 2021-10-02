<?php

namespace Kane;

/**
 * Currency base class
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @psalm-immutable
 */
abstract class Currency
{
    /** @var array<class-string<Currency>,static> */
    private static $instances = [];

    final private function __construct() {}

    /**
     * @pure
     * @return static
     */
    public static function getInstance()
    {
        /**
         * @psalm-suppress ImpureStaticProperty
         * @psalm-suppress PropertyTypeCoercion
         */
        return self::$instances[static::class] = self::$instances[static::class] ?? new static;
    }
}
