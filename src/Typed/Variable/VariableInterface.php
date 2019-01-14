<?php
declare(strict_types=1);

namespace Typed\Variable;

interface VariableInterface
{
    public function &getValue();
}
