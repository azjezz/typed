<?php declare(strict_types=1);

namespace Typed;

final class Repository 
{
    private static array $variables = [];
    private function __construct() {}
    public static function add(Variable $var): void 
    {
        static::$variables[] = $var;
    }
}
