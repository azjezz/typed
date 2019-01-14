<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class FloatVariable
 *
 * @package Typed\Variable
 */
class FloatVariable implements VariableInterface
{
    /**
     * @var float $value
     */
    private float $value;

    /**
     * FloatVariable constructor.
     *
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function &getValue(): float
    {
        return $this->value;
    }
}
