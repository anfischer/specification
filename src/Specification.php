<?php
declare(strict_types=1);

namespace Anfischer\Specification;

abstract class Specification
{
    /**
     * Abstract implementation of isSatisfiedBy.
     * Subclasses will use this method to implement their
     * own contract for validation logic.
     *
     * @param mixed $object
     * @return bool
     */
    abstract public function isSatisfiedBy($object): bool;

    /**
     * Method to allow for chaining specifications which must all satisfy
     *
     * @param Specification $specification
     * @return AndSpecification
     */
    public function and(Specification $specification): AndSpecification
    {
        return new AndSpecification($this, $specification);
    }

    /**
     * Method to allow for chaining specifications where at least one must satisfy
     *
     * @param Specification $specification
     * @return OrSpecification
     */
    public function or(Specification $specification): OrSpecification
    {
        return new OrSpecification($this, $specification);
    }

    /**
     * Method to allow for negation of a specification by forcing it to not satisfy
     *
     * @return NotSpecification
     */
    public function not(): NotSpecification
    {
        return new NotSpecification($this);
    }
}
