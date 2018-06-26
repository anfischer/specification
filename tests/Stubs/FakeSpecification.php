<?php

namespace Anfischer\Specification\Tests\Stubs;

use Anfischer\Specification\Specification;

class FakeSpecification extends Specification
{
    public function isSatisfiedBy($object): bool
    {
        return $object->bool;
    }
}
