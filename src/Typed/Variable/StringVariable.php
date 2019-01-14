<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class StringVariable
 *
 * @package Typed\Variable
 */
class StringVariable implements VariableInterface
{
    /**
     * @var string $value
     */
    private string $value;

    /**
     * StringVariable constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function &getValue(): string
    {
        return $this->value;
    }
}
