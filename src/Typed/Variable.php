<?php declare(strict_types=1);

namespace Typed;

use stdClass;
use Countable;
use Traversable;
use ArrayObject;

final class Variable 
{
  private string $string = '';
  private float $float = 0.0;
  private int $int = 0;
  private array $array = [];
  private bool $bool = false;
  private iterable $iterable = [];
  private stdClass $stdClass;
  private object $object;
  private callable $callable;
  private Countable $countable;
  private Traversable $traversable;
  
  private function __construct() {
    Repository::add($this);
  }
  
  public static function string(string $value = ''): string
  {
     $var = new self();
     $var->string = $value;
     return &$var->string;
  }
  
  public static function float(float $value = 0.0): float
  {
    $var = new self();
    $var->float = $value;
    return &$var->float;
  }
  
  public static function int(int $value = 0): int
  {
    $var = new self();
    $var->int = $value;
    return &$var->int;
  }
  
  public static function array(array $value = []): array
  {
    $var = new self();
    $var->array = $value;
    return &$var->array;
  }
  
  public static function bool(bool $value = false): bool
  {
    $var = new self();
    $var->bool = $value;
    return &$var->bool;
  }
  
  public static function iterable(iterable $value = []): iterable
  {
    $var = new self();
    $var->iterable = $value;
    return &$var->iterable;
  }
  
  public static function stdClass(?stdClass $value = null): stdClass
  {
    $value ??= new stdClass();
    $var = new self();
    $var->stdClass = $value;
    return &$var->stdClass;
  }
  
  public static function object(?object $value = null): object
  {
    $value ??= new stdClass();
    $var = new self();
    $var->object = $value;
    return &$var->object;
  }
  
  public static function callable(?callable $value = null): callable
  {
    $value ??= [static::class, 'callable'];
    $var = new self();
    $var->callable = $value;
    return &$var->callable;
  }
  
  public static function countable(?Countable $value = null): Countable
  {
    $value ??= new ArrayObject();
    $var = new self();
    $var->countable = $value;
    return &$var->countable;
  }
  
  public static function traversable(?Traversable $value = null): Traversable
  {
    $value ??= new ArrayObject();
    $var = new self();
    $var->traversable = $value;
    return &$var->traversable;
  }
}
