<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class IntVariable
 *
 * @package Typed\Variable
 */
class IntVariable implements VariableInterface
{
    /**
     * @var int $value
     */
    private int $value;

    /**
     * IntVariable constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function &getValue(): int
    {
        return $this->value;
    }
}
