<?php

namespace Anfischer\Specification\Tests\Stubs;

use Anfischer\Specification\Specification;

class FakePassingSpecification extends Specification
{
    public function isSatisfiedBy($object): bool
    {
        return true;
    }
}
