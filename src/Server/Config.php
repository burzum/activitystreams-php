<?php
namespace ActivityStreams\Server;

use RuntimeException;

/**
 * Config Object
 */
class Config
{
    /**
     * Values
     *
     * @var array
     */
    public static $values = [];

    /**
     * Get values
     *
     * @param  string $key
     * @param  mixed  $defaultValue
     * @return mixed
     */
    static function get(string $key, $defaultValue = null)
    {
        if (!isset(static::$values[$key])) {
            if (func_num_args() < 2) {
                throw new RuntimeException('Configuration key: ' . $key . ' is not set!');
            }

            return $defaultValue;
        }

        return static::$values[$key];
    }

    /**
     * Set config values
     *
     * @param  string $key   Key
     * @param  mixed  $value Value
     * @return void
     */
    static function set(string $key, $value): void
    {
        static::$values[$key] = $value;
    }

    /**
     * Set values
     *
     * @param  array $values Values
     * @return void
     */
    static function setValues(array $values): void
    {
        foreach ($values as $key => $value)
        {
            static::$values[$key] = $value;
        }
    }
}
