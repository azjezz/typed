<?php declare(strict_types=1);

function &typed($value)
{
  if (is_bool($value)) {
    return bool($value);
  } elseif (is_string($value)) {
    return string($value); 
  } elseif (is_float($value)) {
    return float($value);
  } elseif (is_int($value)) {
    return int($value); 
  } elseif (is_iterable($value)) {
    return iterable($value);
  } elseif (is_callable($value, false)) {
    return func($value);
  } elseif (is_object($value)) {
    return object($value);
  } else {
    throw new Typed\InvalidArgumentException(
      sprintf('Couldn\'t create a typed variable for "%s" type.', gettype($value))
    ); 
  }
}

function &string(string $value = ''): string
{
  return Typed\Variable::string($value);
}

function &float(float $value = 0.0): float
{
  return Typed\Variable::float($value);
}
  
function &int(int $value = 0): int
{
  return Typed\Variable::int($value);
}

function &integer(int $value = 0): int
{
  return int($value);
}

function &arr(array $value = []): array
{
  return Typed\Variable::arr($value);
}

/**
 * TODO: create a `Typed\Vector` object to ensure that all keys are numeric
 */
function &vector(array $value = []): array
{
  return arr(array_values($value));        
}
      
/**
 * TODO: create a `Typed\KeySet` class to ensure that all values are valid keys ( string or int )
 */
function &keyset(array $value = []): array
{
  return arr(array_keys($value));        
}
      
/**
 * TODO: create a `Typed\Set` class to ensure that all values are unique
 */
function &set(array $value = []): array
{
  return arr(array_unique($value)); 
}

function &bool(bool $value = false): bool
{
  return Typed\Variable::bool($value);
}

function &boolean(bool $value = false): bool
{
  return bool($value);
}
  
function &iterable(iterable $value = []): iterable
{
  return Typed\Variable::iterable($value);
}
  
function &stdClass(?stdClass $value = null): stdClass
{
  return Typed\Variable::stdClass($value);
}

function &object(?object $value = null): object
{
  return Typed\Variable::object($value);
}

function &func(?callable $value = null): callable
{
  return Typed\Variable::func($value);
}

function &countable(?Countable $value = null): Countable
{
  return Typed\Variable::countable($value);
}

function &traversable(?Traversable $value = null): Traversable
{
  return Typed\Variable::traversable($value);
}
