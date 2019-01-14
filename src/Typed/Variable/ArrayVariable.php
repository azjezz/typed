<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class ArrayVariable
 *
 * @package Typed\Variable
 */
class ArrayVariable implements VariableInterface
{
    /**
     * @var array $value
     */
    private array $value;

    /**
     * ArrayVariable constructor.
     *
     * @param array $value
     */
    public function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function &getValue(): array
    {
        return $this->value;
    }
}
