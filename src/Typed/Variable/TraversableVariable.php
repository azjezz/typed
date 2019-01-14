<?php
declare(strict_types=1);

namespace Typed\Variable;

use Traversable;

/**
 * Class TraversableVariable
 *
 * @package Typed\Variable
 */
class TraversableVariable implements VariableInterface
{
    /**
     * @var Traversable $value
     */
    private Traversable $value;

    /**
     * TraversableVariable constructor.
     *
     * @param Traversable $value
     */
    public function __construct(Traversable $value)
    {
        $this->value = $value;
    }

    /**
     * @return Traversable
     */
    public function &getValue(): Traversable
    {
        return $this->value;
    }
}
