<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\AnyOfSpecification;
use Anfischer\Specification\Tests\Stubs\FakeFailingSpecification;
use Anfischer\Specification\Tests\Stubs\FakePassingSpecification;
use PHPUnit\Framework\TestCase;

class AnyOfSpecificationTest extends TestCase
{
    /** @test */
    public function the_any_of_specification_allows_for_several_satisfiers_where_at_least_one_must_pass(): void
    {
        $passingSpecFirst = new AnyOfSpecification(new FakePassingSpecification);
        $passingSpecSecond = new AnyOfSpecification(new FakePassingSpecification, new FakeFailingSpecification);
        $failingSpecFirst = new AnyOfSpecification(new FakeFailingSpecification);
        $failingSpecSecond = new AnyOfSpecification(new FakeFailingSpecification, new FakeFailingSpecification);

        $this->assertTrue(
            $passingSpecFirst->isSatisfiedBy(new class() {
            })
        );

        $this->assertTrue(
            $passingSpecSecond->isSatisfiedBy(new class() {
            })
        );

        $this->assertFalse(
            $failingSpecFirst->isSatisfiedBy(new class() {
            })
        );

        $this->assertFalse(
            $failingSpecSecond->isSatisfiedBy(new class() {
            })
        );
    }
}
