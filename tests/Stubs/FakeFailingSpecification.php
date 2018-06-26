<?php

namespace Anfischer\Specification\Tests\Stubs;

use Anfischer\Specification\Specification;

class FakeFailingSpecification extends Specification
{
    public function isSatisfiedBy($object): bool
    {
        return false;
    }
}
