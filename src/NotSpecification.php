<?php
declare(strict_types=1);

namespace Anfischer\Specification;

class NotSpecification extends Specification
{
    /**
     * @var Specification
     */
    private $specification;

    /**
     * @param Specification $specification
     */
    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    /**
     * @param mixed $object
     * @return bool
     */
    public function isSatisfiedBy($object): bool
    {
        return ! $this->specification->isSatisfiedBy($object);
    }
}
