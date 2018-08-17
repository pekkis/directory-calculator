<?php

namespace Pekkis\DirectoryCalculator\Tests;

use Pekkis\DirectoryCalculator\DirectoryCalculator;
use Pekkis\DirectoryCalculator\Strategy\Strategy;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class DirectoryCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function initializes()
    {
        $strategy = $this->prophesize(Strategy::class);
        $strategy->calculateDirectory(Argument::type(IdentifiableObj::class))->shouldBeCalled()->willReturn('tussen/lusse');

        $calc = new DirectoryCalculator($strategy->reveal());

        $ret = $calc->calculateDirectory(new IdentifiableObj(1));
        $this->assertEquals('tussen/lusse', $ret);
    }

    /**
     * @test
     */
    public function usesPrefix()
    {
        $strategy = $this->prophesize(Strategy::class);
        $strategy->calculateDirectory(Argument::type(IdentifiableObj::class))->shouldBeCalled()->willReturn('tussen/lusse');

        $calc = new DirectoryCalculator($strategy->reveal(), '/tussenlusse/');

        $ret = $calc->calculateDirectory(new IdentifiableObj(1));
        $this->assertEquals('/tussenlusse/tussen/lusse', $ret);
    }

}