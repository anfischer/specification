<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\Tests\Stubs\FakeFailingSpecification;
use Anfischer\Specification\Tests\Stubs\FakePassingSpecification;
use PHPUnit\Framework\TestCase;

class OrSpecificationTest extends TestCase
{
    /** @test */
    public function multiple_specs_can_be_chained_by_or_to_allow_for_several_satisfiers_where_at_least_one_must_pass(): void
    {
        $passingSpec = new FakePassingSpecification;
        $failingSpec = new FakeFailingSpecification;

        $this->assertTrue(
            $passingSpec->or($failingSpec)->isSatisfiedBy(new class() {
            })
        );

        $this->assertTrue(
            $failingSpec->or($failingSpec)->or($passingSpec)->isSatisfiedBy(new class() {
            })
        );

        $this->assertFalse(
            $failingSpec->or($failingSpec)->isSatisfiedBy(new class() {
            })
        );
    }
}
