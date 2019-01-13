<?php declare(strict_types=1);

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

function integer(int $value = 0): int
{
  return int($value);
}

function &array(array $value = []): array
{
  return Typed\Variable::array($value);
}
  
function &bool(bool $value = false): bool
{
  return Typed\Variable::array($value);
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

function &callable(?callable $value = null): callable
{
  return Typed\Variable::callable($value);
}

function &countable(?Countable $value = null): Countable
{
  return Typed\Variable::countable($value);
}

function &traversable(?Traversable $value = null): Traversable
{
  return Typed\Variable::traversable($value);
}
