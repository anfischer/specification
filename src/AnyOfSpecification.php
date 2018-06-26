<?php
declare(strict_types=1);

namespace Anfischer\Specification;

class AnyOfSpecification extends Specification
{
    /**
     * @var Specification[]
     */
    private $specifications;

    /**
     * @param Specification[] $specifications
     */
    public function __construct(Specification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    /**
     * @param mixed $object
     * @return bool
     */
    public function isSatisfiedBy($object): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($object)) {
                return true;
            }
        }

        return false;
    }
}
