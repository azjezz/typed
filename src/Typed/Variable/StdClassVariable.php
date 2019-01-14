<?php
declare(strict_types=1);

namespace Typed\Variable;

use stdClass;

/**
 * Class StdClassVariable
 *
 * @package Typed\Variable
 */
class StdClassVariable implements VariableInterface
{
    /**
     * @var stdClass $value
     */
    private stdClass $value;

    /**
     * StdClassVariable constructor.
     *
     * @param stdClass $value
     */
    public function __construct(stdClass $value)
    {
        $this->value = $value;
    }

    /**
     * @return stdClass
     */
    public function &getValue(): stdClass
    {
        return $this->value;
    }
}
