<?php
declare(strict_types=1);

namespace Anfischer\Specification;

class AndSpecification extends Specification
{
    /**
     * @var Specification
     */
    private $left;

    /**
     * @var Specification
     */
    private $right;

    /**
     * @param Specification $left
     * @param Specification $right
     */
    public function __construct(Specification $left, Specification $right)
    {
        $this->left   = $left;
        $this->right = $right;
    }

    /**
     * @param mixed $object
     * @return bool
     */
    public function isSatisfiedBy($object): bool
    {
        return $this->left->isSatisfiedBy($object) && $this->right->isSatisfiedBy($object);
    }
}
