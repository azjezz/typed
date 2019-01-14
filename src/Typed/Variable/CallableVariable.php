<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class CallableVariable
 *
 * @package Typed\Variable
 */
class CallableVariable implements VariableInterface
{
    /**
     * @var callable $value
     */
    private callable $value;

    /**
     * CallableVariable constructor.
     *
     * @param callable $value
     */
    public function __construct(callable $value)
    {
        $this->value = $value;
    }

    /**
     * @return callable
     */
    public function &getValue(): callable
    {
        return $this->value;
    }
}
