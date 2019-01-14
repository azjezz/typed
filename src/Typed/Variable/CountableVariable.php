<?php
declare(strict_types=1);

namespace Typed\Variable;

use Countable;

/**
 * Class CountableVariable
 *
 * @package Typed\Variable
 */
class CountableVariable implements VariableInterface
{
    /**
     * @var Countable $value
     */
    private Countable $value;

    /**
     * CountableVariable constructor.
     *
     * @param Countable $value
     */
    public function __construct(Countable $value)
    {
        $this->value = $value;
    }

    /**
     * @return Countable
     */
    public function &getValue(): Countable
    {
        return $this->value;
    }
}
