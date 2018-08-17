<?php

/**
 * This file is part of the pekkis-directory-calculator package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Tests\DirectoryCalculator;

use Pekkis\DirectoryCalculator\Strategy\UniversalLeveledStrategy;
use Pekkis\DirectoryCalculator\LogicException;
use Pekkis\DirectoryCalculator\Tests\UniversallyIdentifiableObj;
use Pekkis\DirectoryCalculator\Tests\IdentifiableObj;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * @group storage
 */
class UniversalLeveledStrategyTest extends TestCase
{

    /**
     * @test
     */
    public function calculateShouldCalculateCorrectly()
    {
        $uuid = 'ee3c0c4c-dcec-4dab-93da-c617887eadf3';
        $resource = new UniversallyIdentifiableObj(1, $uuid);

        $calc = new UniversalLeveledStrategy();
        $this->assertEquals(
            'ee/3c/0c/4c/dc/ec/4d/ab/93/da/c6/17/88/7e/ad/f3',
            $calc->calculateDirectory($resource)
        );
    }

    /**
     * @test
     */
    public function throwsExceptionOnNonUniversallyIdentifiable()
    {
        $resource = new IdentifiableObj('xoo');
        $calc = new UniversalLeveledStrategy();
        $this->expectException(LogicException::class);
        $calc->calculateDirectory($resource);
    }

    /**
     * @test
     */
    public function throwsExceptionOnInvalidUuid()
    {
        $resource = new UniversallyIdentifiableObj(1, 'xoo-xoo-lusb');
        $calc = new UniversalLeveledStrategy();
        $this->expectException(LogicException::class);
        $calc->calculateDirectory($resource);
    }

    /**
     * @test
     */
    public function acceptsUppercase()
    {
        $uuid = strtoupper(Uuid::uuid4()->toString());

        $resource = new UniversallyIdentifiableObj('xoo', $uuid);
        $calc = new UniversalLeveledStrategy();
        $this->assertInternalType('string', $calc->calculateDirectory($resource));
    }

}
