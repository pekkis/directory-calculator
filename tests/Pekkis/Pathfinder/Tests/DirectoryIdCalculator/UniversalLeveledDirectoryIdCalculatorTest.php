<?php

/**
 * This file is part of the Xi Filelib package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder\Tests\DirectoryIdCalculator;

use Pekkis\Pathfinder\DirectoryIdCalculator\TimeDirectoryIdCalculator;
use Pekkis\Pathfinder\DirectoryIdCalculator\UniversalLeveledDirectoryIdCalculator;
use Pekkis\Pathfinder\LogicException;
use Pekkis\Pathfinder\Tests\UniversallyIdentifiableObj;
use Pekkis\Pathfinder\Tests\IdentifiableObj;
use Rhumsaa\Uuid\Uuid;

/**
 * @group storage
 */
class UniversalLeveledDirectoryIdCalculatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function calculateShouldCalculateCorrectly()
    {
        $uuid = 'ee3c0c4c-dcec-4dab-93da-c617887eadf3';
        $resource = new UniversallyIdentifiableObj(1, $uuid);

        $calc = new UniversalLeveledDirectoryIdCalculator();
        $this->assertEquals(
            'ee/3c/0c/4c/dc/ec/4d/ab/93/da/c6/17/88/7e/ad/f3',
            $calc->calculateDirectoryId($resource)
        );
    }

    /**
     * @test
     */
    public function throwsExceptionOnNonUniversallyIdentifiable()
    {
        $resource = new IdentifiableObj('xoo');
        $calc = new UniversalLeveledDirectoryIdCalculator();
        $this->setExpectedException(LogicException::class);
        $calc->calculateDirectoryId($resource);
    }

    /**
     * @test
     */
    public function throwsExceptionOnInvalidUuid()
    {
        $resource = new UniversallyIdentifiableObj(1, 'xoo-xoo-lusb');
        $calc = new UniversalLeveledDirectoryIdCalculator();
        $this->setExpectedException(LogicException::class);
        $calc->calculateDirectoryId($resource);
    }

    /**
     * @test
     */
    public function acceptsUppercase()
    {
        $uuid = strtoupper(Uuid::uuid4()->toString());

        $resource = new UniversallyIdentifiableObj('xoo', $uuid);
        $calc = new UniversalLeveledDirectoryIdCalculator();
        $this->assertInternalType('string', $calc->calculateDirectoryId($resource));
    }

}
