<?php declare(strict_types=1);

namespace Typed;

use stdClass;
use Countable;
use Traversable;
use function is_int;
use function is_bool;
use function is_float;
use function is_string;
use function is_object;
use function is_iterable;
use function is_callable;
use function gettype;
use function sprintf;

/**
 * Create a typed variable based on the given arguments type.
 *
 * Supported types : bool, callable, float, int, iterable, object and string
 *
 * @note: passing a `Traversable` or `Countable` will result in a typed `object` variable.
 *
 * @param bool|callable|float|int|iterable|object|string $value     the value to guess the type from.
 *
 * @param string                                         $namespace the namespace to use for the variable.
 *
 * @return bool|callable|float|int|iterable|object|string
 */
function &typed($value, string $namespace = 'default')
{
    if (is_bool($value)) {
        return bool($value, $namespace);
    } elseif (is_string($value)) {
        return string($value, $namespace);
    } elseif (is_float($value)) {
        return float($value, $namespace);
    } elseif (is_int($value)) {
        return int($value, $namespace);
    } elseif (is_iterable($value)) {
        return iterable($value, $namespace);
    } elseif (is_callable($value, false)) {
        return func($value, $namespace);
    } elseif (is_object($value)) {
        return object($value, $namespace);
    } else {
        throw new InvalidArgumentException(
            sprintf('Couldn\'t create a typed variable for "%s" type.', gettype($value))
        );
    }
}

/**
 * Create a typed string variable.
 *
 * @param string $value
 * @param string $namespace
 *
 * @return string
 */
function &string(string $value, string $namespace = 'default'): string
{
    $var = new Variable\StringVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a typed float variable.
 *
 * @param float  $value
 * @param string $namespace
 *
 * @return float
 */
function &float(float $value, string $namespace = 'default'): float
{
    $var = new Variable\FloatVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a typed integer variable.
 *
 * @param int    $value
 * @param string $namespace
 *
 * @return int
 */
function &int(int $value, string $namespace = 'default'): int
{
    $var = new Variable\IntVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * @see int()
 *
 * @param int    $value
 * @param string $namespace
 *
 * @return int
 */
function &integer(int $value, string $namespace = 'default'): int
{
    return int($value, $namespace);
}

/**
 * Create a typed array variable.
 *
 * @param array  $value
 * @param string $namespace
 *
 * @return array
 */
function &arr(array $value, string $namespace = 'default'): array
{
    $var = new Variable\ArrayVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a typed array variable from the values of the passed argument.
 *
 * @param array  $value
 * @param string $namespace
 *
 * @return array
 */
function &vector(array $value, string $namespace = 'default'): array
{
    return arr(array_values($value), $namespace);
}

/**
 * Create a typed array variable from the keys of the passed argument.
 *
 * @param array $value
 * @param string $namespace
 *
 * @return array
 */
function &keyset(array $value, string $namespace = 'default'): array
{
    return arr(array_keys($value), $namespace);
}

/**
 * Create a typed array variable from the unique values of the passed argument.
 *
 * @param array  $value
 * @param string $namespace
 *
 * @return array
 */
function &set(array $value, string $namespace = 'default'): array
{
    return arr(array_unique($value), $namespace);
}

/**
 * Create a typed boolean variable.
 *
 * @param bool   $value
 * @param string $namespace
 *
 * @return bool
 */
function &bool(bool $value, string $namespace = 'default'): bool
{
    $var = new Variable\BoolVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * @see bool()
 *
 * @param bool   $value
 * @param string $namespace
 *
 * @return bool
 */
function &boolean(bool $value, string $namespace = 'default'): bool
{
    return bool($value, $namespace);
}

/**
 * Create a typed iterable variable.
 *
 * @param iterable $value
 * @param string   $namespace
 *
 * @return iterable
 */
function &iterable(iterable $value, string $namespace = 'default'): iterable
{
    $var = new Variable\IterableVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a typed stdClass variable.
 *
 * @param stdClass $value
 * @param string   $namespace
 *
 * @return stdClass
 */
function &stdClass(stdClass $value, string $namespace = 'default'): stdClass
{
    $var = new Variable\StdClassVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a typed object variable.
 *
 * @param object $value
 * @param string $namespace
 *
 * @return object
 */
function &object(object $value, string $namespace = 'default'): object
{
    $var = new Variable\ObjectVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a typed callable variable.
 *
 * @param callable $value
 * @param string   $namespace
 *
 * @return callable
 */
function &func(callable $value, string $namespace = 'default'): callable
{
    $var = new Variable\CallableVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a `Countable` typed variable.
 *
 * @param Countable $value
 * @param string    $namespace
 *
 * @return Countable
 */
function &countable(Countable $value, string $namespace = 'default'): Countable
{
    $var = new Variable\CountableVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * Create a `Traversable` typed variable.
 *
 * @param Traversable $value
 * @param string      $namespace
 *
 * @return Traversable
 */
function &traversable(Traversable $value, string $namespace = 'default'): Traversable
{
    $var = new Variable\TraversableVariable($value);
    Repository::add($var, $namespace);
    return $var->getValue();
}

/**
 * remove reference to all variables in the given namespace.
 *
 * @param string $namespace
 */
function clean(string $namespace = 'default'): void
{
    Repository::clean($namespace);
}

/**
 * Delete all references.
 */
function purge(): void
{
    Repository::purge();
}

/**
 * Delete all references to variables with the given value.
 *
 * @param mixed         $value      value to check.
 * @param string|null   $namespace
 */
function filter($value, string $namespace = 'default'): void
{
    Repository::filter($value, $namespace);
}

/**
 * remove the last reference to variable with the given value in a specific namespace.
 *
 * @param        $value
 * @param string $namespace
 */
function delete($value, string $namespace): void
{
    Repository::delete($value, $namespace);
}

/**
 * Contain all typed variables in 1 call.
 * All typed variables created during the callable execution, will be deleted.
 *
 * @param callable $call
 */
function c(callable $call): void
{
    Repository::c($call);
}
