<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\Tests\Stubs\FakeFailingSpecification;
use Anfischer\Specification\Tests\Stubs\FakePassingSpecification;
use PHPUnit\Framework\TestCase;

class NotSpecificationTest extends TestCase
{
    /** @test */
    public function the_not_negator_allows_for_a_spec_to_be_forced_to_not_satisfy(): void
    {
        $passingSpec = new FakePassingSpecification;
        $failingSpec = new FakeFailingSpecification;

        $this->assertTrue(
            $failingSpec->not()->isSatisfiedBy(new class() {
            })
        );

        $this->assertFalse(
            $passingSpec->not()->isSatisfiedBy(new class() {
            })
        );
    }
}
