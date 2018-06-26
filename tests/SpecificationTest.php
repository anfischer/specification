<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\Tests\Stubs\FakeSpecification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    private $spec;

    public function setUp()
    {
        $this->spec = new FakeSpecification;
    }

    private function generateBoolSatisfyer(bool $value)
    {
        return new class($value) {
            public $bool;
            public function __construct(bool $bool)
            {
                $this->bool = $bool;
            }
        };
    }

    /** @test */
    public function a_spec_can_verify_that_it_is_satisfied(): void
    {
        $this->assertTrue(
            $this->spec->isSatisfiedBy($this->generateBoolSatisfyer(true))
        );

        $this->assertFalse(
            $this->spec->isSatisfiedBy($this->generateBoolSatisfyer(false))
        );
    }

    /** @test */
    public function a_spec_can_verify_that_it_is_not_satisfied(): void
    {
        $this->assertFalse(
            $this->spec->not()->isSatisfiedBy($this->generateBoolSatisfyer(true))
        );

        $this->assertTrue(
            $this->spec->not()->isSatisfiedBy($this->generateBoolSatisfyer(false))
        );
    }
}
