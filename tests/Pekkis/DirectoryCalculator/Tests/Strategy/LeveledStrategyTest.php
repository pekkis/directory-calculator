<?php

/**
 * This file is part of the pekkis-directory-calculator package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Tests\DirectoryCalculator;

use Pekkis\DirectoryCalculator\Strategy\LeveledStrategy;
use Pekkis\DirectoryCalculator\InvalidArgumentException;
use Pekkis\DirectoryCalculator\LogicException;
use Pekkis\DirectoryCalculator\Tests\IdentifiableObj;

/**
 * @group storage
 */
class LeveledStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function provideData()
    {
        return array(
            array('1', 1, 10, 1),
            array('1', 1, 10, 10),
            array('2', 1, 10, 11),
            array('100', 1, 10, 1000),
            array('101', 1, 10, 1001),
            array('13', 1, 77, 1001),
            array('1/1', 2, 100, 1),
            array('1/2', 2, 100, 101),
            array('11/1', 2, 100, 100001),
            array('205/382', 2, 777, 123456789),
            array('1/1/100/100/100', 5, 100, 100000000),
        );
    }

    /**
     * @test
     * @dataProvider provideData
     */
    public function calculatorShouldCalculateCorrectly($expected, $directoryLevels, $filesPerDirectory, $resourceId)
    {
        $resource = new IdentifiableObj($resourceId);
        $calculator = new LeveledStrategy($directoryLevels, $filesPerDirectory);

        $this->assertEquals($expected, $calculator->calculateDirectory($resource));
    }

    /**
     * @test
     */
    public function throwsExceptionOnNonNumericFileId()
    {
        $this->setExpectedException(LogicException::class);

        $resource = new IdentifiableObj('xoo');
        $calc = new LeveledStrategy();
        $calc->calculateDirectory($resource);
    }

    /**
     * @test
     */
    public function wontInstantiateWithInvalidDirectoryLevels()
    {
        $this->setExpectedException(InvalidArgumentException::class);

        $calc = new LeveledStrategy(0, 50);
    }

    /**
     * @test
     */
    public function wontInstantiateWithInvalidFilesPerDirectory()
    {
        $this->setExpectedException(InvalidArgumentException::class);

        $calc = new LeveledStrategy(5, 0);
    }

    /**
     * @test
     */
    public function defaultSettingsShouldProduceSaneDirectoryIdInTheDistantFuture()
    {
        $resource = new IdentifiableObj(500066666);
        $calc = new LeveledStrategy();
        $this->assertEquals('5/1/134', $calc->calculateDirectory($resource));
    }

}
