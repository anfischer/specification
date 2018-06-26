<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\Tests\Stubs\FakeFailingSpecification;
use Anfischer\Specification\Tests\Stubs\FakePassingSpecification;
use PHPUnit\Framework\TestCase;

class AndSpecificationTest extends TestCase
{
    /** @test */
    public function multiple_specs_can_be_chained_by_and_to_allow_for_several_satisfiers_which_must_all_pass(): void
    {
        $passingSpec = new FakePassingSpecification;
        $failingSpec = new FakeFailingSpecification;

        $this->assertTrue(
            $passingSpec->and($passingSpec)->isSatisfiedBy(new class() {
            })
        );

        $this->assertTrue(
            $passingSpec->and($passingSpec)->and($passingSpec)->isSatisfiedBy(new class() {
            })
        );

        $this->assertFalse(
            $passingSpec->and($failingSpec)->isSatisfiedBy(new class() {
            })
        );
    }
}
