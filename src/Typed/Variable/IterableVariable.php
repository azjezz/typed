<?php
declare(strict_types=1);

namespace Typed\Variable;

/**
 * Class IterableVariable
 *
 * @package Typed\Variable
 */
class IterableVariable implements VariableInterface
{
    /**
     * @var iterable $value
     */
    private iterable $value;

    /**
     * IterableVariable constructor.
     *
     * @param iterable $value
     */
    public function __construct(iterable $value)
    {
        $this->value = $value;
    }

    /**
     * @return iterable
     */
    public function &getValue(): iterable
    {
        return $this->value;
    }
}
