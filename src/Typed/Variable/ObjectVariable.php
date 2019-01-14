<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class ObjectVariable
 *
 * @package Typed\Variable
 */
class ObjectVariable implements VariableInterface
{
    /**
     * @var object $value
     */
    private object $value;

    /**
     * ObjectVariable constructor.
     *
     * @param object $value
     */
    public function __construct(object $value)
    {
        $this->value = $value;
    }

    /**
     * @return object
     */
    public function &getValue(): object
    {
        return $this->value;
    }
}
