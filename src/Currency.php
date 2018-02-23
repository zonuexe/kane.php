<?php

namespace Kane;

/**
 * Currency base class
 *
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2018 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
abstract class Currency
{
    /** @var Currency */
    private $instances = [];

    private function __construct() {}

    /**
     * @return static
     */
    public static function getInstance()
    {
        return $instances[static::class] = $instances[static::class] ?? new static;
    }
}
