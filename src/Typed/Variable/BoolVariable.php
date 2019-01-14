<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class BoolVariable
 *
 * @package Typed\Variable
 */
class BoolVariable implements VariableInterface
{
    /**
     * @var bool $value
     */
    private bool $value;

    /**
     * BoolVariable constructor.
     *
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function &getValue(): bool
    {
        return $this->value;
    }
}
