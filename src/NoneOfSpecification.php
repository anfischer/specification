<?php
declare(strict_types=1);

namespace Anfischer\Specification;

class NoneOfSpecification extends Specification
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
                return false;
            }
        }

        return true;
    }
}
