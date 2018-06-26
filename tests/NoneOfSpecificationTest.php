<?php

namespace Anfischer\Specification\Tests;

use Anfischer\Specification\NoneOfSpecification;
use Anfischer\Specification\Tests\Stubs\FakeFailingSpecification;
use Anfischer\Specification\Tests\Stubs\FakePassingSpecification;
use PHPUnit\Framework\TestCase;

class NoneOfSpecificationTest extends TestCase
{
    /** @test */
    public function the_none_of_specification_allows_for_several_satisfiers_where_none_must_pass(): void
    {
        $passingSpecFirst = new NoneOfSpecification(new FakeFailingSpecification);
        $passingSpecSecond = new NoneOfSpecification(new FakeFailingSpecification, new FakeFailingSpecification);
        $failingSpecFirst = new NoneOfSpecification(new FakePassingSpecification);
        $failingSpecSecond = new NoneOfSpecification(new FakePassingSpecification, new FakeFailingSpecification);

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
