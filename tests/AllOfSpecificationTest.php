<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\AllOfSpecification;
use Anfischer\Specification\Tests\Stubs\FakeFailingSpecification;
use Anfischer\Specification\Tests\Stubs\FakePassingSpecification;
use PHPUnit\Framework\TestCase;

class AllOfSpecificationTest extends TestCase
{
    /** @test */
    public function the_all_of_specification_allows_for_several_satisfiers_where_all_must_pass(): void
    {
        $passingSpec = new AllOfSpecification(new FakePassingSpecification);
        $failingSpec = new AllOfSpecification(new FakePassingSpecification, new FakeFailingSpecification);

        $this->assertTrue(
            $passingSpec->isSatisfiedBy(new class() {
            })
        );

        $this->assertFalse(
            $failingSpec->isSatisfiedBy(new class() {
            })
        );
    }
}
