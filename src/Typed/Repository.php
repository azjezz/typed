<?php declare(strict_types=1);

namespace Typed;

use function array_key_exists;
use function array_keys;
use function array_reverse;
use Typed\Variable\VariableInterface;

final class Repository
{
    /**
     * @var array<string, array<int, VariableInterface>> $variables
     */
    private static array $variables = [];

    private function __construct()
    {
    }

    /**
     * Add a variable to the registry mapped by the given namespace.
     *
     * @param VariableInterface $var
     * @param string            $namespace
     */
    public static function add(VariableInterface $var, string $namespace): void
    {
        static::$variables[$namespace][] = $var;
    }

    /**
     * remove reference to all variables in the given namespace.
     *
     * @param string $namespace
     */
    public static function clean(string $namespace): void
    {
        unset(static::$variables[$namespace]);
    }

    /**
     * Delete all references.
     */
    public static function purge(): void
    {
        static::$variables = [];
    }

    /**
     * Delete all references to variables with the given value.
     *
     * @param mixed         $value      value to check.
     * @param string|null   $namespace
     */
    public static function filter($value, string $namespace): void
    {
        if (!array_key_exists($namespace, static::$variables)) {
            return;
        }

        /**
         * @var VariableInterface $var
         */
        foreach (static::$variables[$namespace] as $i => $var) {
            if ($var->getValue() === $value) {
                unset(static::$variables[$namespace][$i]);
            }
        }
    }

    /**
     * remove the last reference to variable with the given value in a specific namespace.
     *
     * @param        $value
     * @param string $namespace
     */
    public static function delete($value, string $namespace): void
    {
        if (!array_key_exists($namespace, static::$variables)) {
            return;
        }

        $keys = array_reverse(array_keys(static::$variables[$namespace]));
        foreach ($keys as $k) {
            /**
             * @var VariableInterface $var
             */
            $var = static::$variables[$namespace][$k];
            if ($var->getValue() === $value) {
                unset(static::$variables[$namespace][$k]);
                return;
            }
        }
    }

    /**
     * Contain all typed variables in 1 call.
     * All typed variables created during the callable execution, will be deleted.
     *
     * @param callable $call
     */
    public static function c(callable $call): void
    {
        $variables = static::$variables;
        static::$variables = [];
        try {
            $call();
        } finally {
            static::$variables = $variables;
        }
    }
}
